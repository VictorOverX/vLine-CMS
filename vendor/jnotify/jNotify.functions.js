/*
 * Notificação de Sucesso
 * @texto: Contéudo da mensagem
 * @reload: ( true ) para ativar o reload
 * @time: Tempo do reload
 */
function noty_success(texto, reload, time){
    jSuccess('<div class="text-center">Tudo certo!!! =D<br />'+ texto +'</div>',
        {
            autoHide: true, // added in v2.0
            TimeShown: 3000,
            MinWidth: 500,
            HorizontalPosition: 'center'
        }
    );

    if(reload == true && time == null){ time = 2000; }
    if(reload == true)
    {
        window.setTimeout(function () {
            window.location.reload();
        }, time);

        //console.log(time);
    }
}

function noty(texto, reload, time){
    jSuccess(texto,
        {
            autoHide: true, // added in v2.0
            TimeShown: 3000,
            MinWidth: 500,
            HorizontalPosition: 'center'
        }
    );

    if(reload == true && time == null){ time = 2000; }
    if(reload == true)
    {
        window.setTimeout(function () {
            window.location.reload();
        }, time);

        //console.log(time);
    }
}

/*
 * Notificação de Atenção
 * @texto: Contéudo da mensagem
 * @reload: ( true ) para ativar o reload
 * @time: Tempo do reload
 */
function noty_default(texto, reload, time){
    jNotify('<div class="text-center">Ops! Muita Atenção!!! -.- <br />'+ texto +'</div>',
        {
            autoHide: true, // added in v2.0
            TimeShown: 3000,
            MinWidth: 500,
            HorizontalPosition: 'center'
        }
    );

    if(reload == true && time == null){ time = 2000; }
    if(reload == true)
    {
        window.setTimeout(function () {
            window.location.reload();
        }, time);

       // console.log(time);
    }
}

/*
 * Notificação de Erro
 * @texto: Contéudo da mensagem
 * @reload: ( true ) para ativar o reload
 * @time: Tempo do reload
 */
function noty_error(texto, reload, time){
    jError('<div class="text-center">Vixi Ocorreu um Erro!!!<br />' + texto + '</div>',
        {
            autoHide: true, // added in v2.0
            TimeShown: 3000,
            MinWidth: 500,
            HorizontalPosition: 'center'
        }
    );

    if(reload == true && time == null){ time = 2000; }
    if(reload == true)
    {
        window.setTimeout(function () {
            window.location.reload();
        }, time);
    }
}