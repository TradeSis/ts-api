
def input  parameter vlcentrada as longchar.

def var vlcsaida   as longchar.
def var vsaida as char.

def var lokjson as log.
def var hentrada as handle.
def var hsaida   as handle.
/*
{
    "tsrelat": [
        {
            "usercod": "HELIO",
            "progcod": "rel1.p",
            "relatnom": "xpto"
        }
    ]
}
*/
def temp-table ttentrada no-undo serialize-name "tsrelat"
    field usercod as char
    field progcod as char
    field relatnom as char
    field parametrosJSON as char serialize-name "parametros"
    field REMOTE_ADDR as char.

def temp-table tttsrelat  no-undo serialize-name "relatorios"
    field usercod   as char    
    field dtinclu   as date format "99/99/9999"
    field hrinclu   as char
    field progcod   as char
    field relatnom  as char
    field nomeArquivo  as char
    field REMOTE_ADDR as char
    field parametrosJSON as char serialize-name "parametros".

def temp-table ttsaida  no-undo serialize-name "conteudoSaida"
    field tstatus        as int serialize-name "status"
    field descricaoStatus      as char.
   

hEntrada = temp-table ttentrada:HANDLE.
lokJSON = hentrada:READ-JSON("longchar",vlcentrada, "EMPTY").
find first ttentrada no-error.
if not avail ttentrada
then do:
    create ttsaida.
    ttsaida.tstatus = 500.
    ttsaida.descricaoStatus = "Sem dados de Entrada".

    hsaida  = temp-table ttsaida:handle.

    lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).
    message string(vlcSaida).
    return.
end.
def var lcjsonentrada as longchar.
lcjsonentrada = ttentrada.parametrosJSON.
/* message "MESSAGE" string(lcjsonentrada). */

    create tsrelat.
    tsrelat.progcod  = ttentrada.progcod.
    tsrelat.usercod  = ttentrada.usercod.
    tsrelat.relatnom = ttentrada.relatnom.
    tsrelat.dtinclu  = today.
    tsrelat.hrinclu  = time.
    tsrelat.REMOTE_ADDR = ttentrada.REMOTE_ADDR.    
    
    
    copy-lob FROM lcjsonentrada to tsrelat.parametrosJSON .

    create tttsrelat.
    tttsrelat.progcod  = tsrelat.progcod.
    tttsrelat.usercod  = tsrelat.usercod.
    tttsrelat.relatnom = tsrelat.relatnom.
    tttsrelat.dtinclu  = tsrelat.dtinclu.
    tttsrelat.hrinclu  = string(tsrelat.hrinclu,"HH:MM:SS").
    tttsrelat.REMOTE_ADDR = tsrelat.REMOTE_ADDR.
    tttsrelat.parametrosJSON = ttentrada.parametrosJSON.

hsaida  = temp-table tttsrelat:handle.

lokJson = hsaida:WRITE-JSON("LONGCHAR", vlcSaida, TRUE).

put unformatted string(vlcSaida).
