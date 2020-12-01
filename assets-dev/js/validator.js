/*
    version: 1.0.0

    Copyright 2020

    notes: Add this to your form element <form class="needs-validation" novalidate></form> to use validator effectively.
    Then also add this below
*/

let error_counter = []; // {name: 'name', message: 'error message'}

$.fn.isInvalid = function(name, message)
{
    const form = this;
    const input = form.find(`[name="${name}"]`);
    const form_group = input.parents('div.form-group');
    const feedback = form_group.find('div.invalid-feedback');

    input.addClass('is-invalid');

    if(message)
        if(!feedback.text().includes(`${message}`))
            feedback.append(`<p class="mb-0">${message}</p>`);
}

$.fn.isValid = function(name)
{
    const form = this;
    const input = form.find(`[name="${name}"]`);
    const form_group = input.parents('div.form-group');
    const feedback = form_group.find('div.invalid-feedback');

    input.removeClass('is-invalid').addClass('is-valid');

    feedback.text('');
}

$.fn.resetValidation = function()
{
    const form = this;
    const inputs = form.find(`input`);
    const selects = form.find(`select`);
    const textareas = form.find(`textarea`);
    const feedbacks = form.find('div.invalid-feedback');

    error_counter = [];

    inputs.removeClass('is-invalid').removeClass('is-valid');
    selects.removeClass('is-invalid').removeClass('is-valid');
    textareas.removeClass('is-invalid').removeClass('textarea');

    feedbacks.text('')
}

$.fn.isValidateType = function(name, message)
{
    const form = this;
    const input = form.find(`[name="${name}"]`);
    const form_group = input.parents('div.form-group');
    const feedback = form_group.find('div.invalid-feedback');

    input.addClass('is-invalid');

    if(message)
        if(!feedback.text().includes(`${message}`))
            feedback.append(`<p class="mb-0">${message}</p>`);
}

$.fn.validateSubmit = function(not_required = [])
{
    const form = this;

    form.resetValidation();

    form.each(function()
    {
        let input = $(this).find('input:not([type="search"]):visible');
        let select = $(this).find('select:visible');
        let textarea = $(this).find('textarea:visible');

        input.each(function()
        {
            let name = $(this).attr('name');
            let title = $(this).attr('title');
            let type =  $(this).attr('type');
            let placeholder =  $(this).attr('placeholder');
            let message = `${title || ( placeholder ? placeholder.replace("Enter", "") : '' ) || ucwords(name.replace("_", " "))} is required.`;

            if(!not_required.includes(name))
            {
                if(!form.formName(name))
                    error_counter = [{name, message}, ...error_counter];
                else
                {
                    const numbers = /[0-9]/g;
                    const letters = /[A-Za-z]/g;

                    if(type == "email")
                        if(!validateEmail(form.formName(name)))
                            error_counter = [{name, message: 'Invalid email address.'}, ...error_counter];

                    if(type == "password")
                    {
                        if(!form.formName(name).match(letters)) //Validate letters
                            error_counter = [{name, message: 'Please put letters.'}, ...error_counter];

                        if(!form.formName(name).match(numbers)) //Validate numbers
                            error_counter = [{name, message: 'Please put number.'}, ...error_counter];

                        if(form.formName(name).length < 8) //validate length
                            error_counter = [{name, message: 'Minimun of 8 characters.'}, ...error_counter];
                    }

                    if(type == "tel")
                        if(form.formName(name).length < 7)
                            error_counter = [{name, message: 'Minimun of 7 characters..'}, ...error_counter];
                }
            }
            else
            {
                if(form.formName(name))
                    if(type == "email")
                        if(!validateEmail(form.formName(name)))
                            error_counter = [{name, message: 'Invalid email address.'}, ...error_counter];
            }
            form.isValid(name);
        });

        select.each(function()
        {
            let name = $(this).attr('name');
            let title = $(this).attr('title');
            let message = `${title || ucwords(name.replace("_", " "))} is required.`;

            if(!not_required.includes(name))
                if(!form.formName(name) || form.formName(name) == '')
                    error_counter = [{name, message}, ...error_counter];
        });

        textarea.each(function()
        {
            let name = $(this).attr('name');
            let title = $(this).attr('title');
            let placeholder =  $(this).attr('placeholder');
            let message = `${title || ( placeholder ? placeholder.replace("Enter", "") : '' ) || ucwords(name.replace("_", " "))} is required.`;

            if(!not_required.includes(name))
                if(!form.formName(name) || form.formName(name) == '')
                    error_counter = [{name, message}, ...error_counter];
        });
    });
}

