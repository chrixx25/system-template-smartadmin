$('#sms-login').on('submit', (e) =>
{
    const form = $('#sms-login');
    const user = $('#username').val();
    const pass = $('#password').val();

    $.fn.btnSubmit = function(disabled = false)
    {
        const save = `<i class="fas fa-save"></i><span> Login</span>`;
        const processing = `<i class='fas fa-spinner fa-spin'></i> <span> Login</span>`;

        this.find(`button[type='submit']`).attr("disabled", disabled);
        this.find(`button[type='submit']`).html(disabled ? processing : save);
    }

    const error = (err) =>
    {
        const {
            status,
            responseJSON,
            statusText,
            message,
        } = err;

        if (status > 399 && status < 500)
        {
            alert(`${responseJSON ? responseJSON.message : statusText}`)
        }
        else
        {
            console.error(message);
            alert('Something went wrong, Wer\'re working on it.')
        }
        form.trigger('reset');
    };

    form.btnSubmit(true);

    $.ajax({
        url: API('login'),
        method: "POST",
        data: {
            user,
            pass
        }
    })
    .then(res => {
        const token = res.token;
        console.log({
            data: JSON.parse(atob(token.split('.')[1]))
        })
        $.ajax({
            url: baseUrl('set-session'),
            method: 'POST',
            data: {
                data: JSON.parse(atob(token.split('.')[1]))
            }
        }).then(d =>
        {
            sessionStorage.setItem('sms_token', token)
            window.location.replace(baseUrl('home'))
            form.btnSubmit();
        }).fail(err => {
            error(err)
            form.btnSubmit();
        })
    })
    .fail(err => {
        error(err)
        form.btnSubmit();
    })
    e.preventDefault()

    return false;
});
