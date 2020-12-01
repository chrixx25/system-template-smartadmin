//Jconfirm general settings
jconfirm.defaults = {
    type: 'blue'
    , boxWidth: '25%'
    , useBootstrap: false
    , animation: 'none'
    , closeAnimation: 'none'
};

toastr.options = {
	"closeButton": false,
	"debug": false,
	"newestOnTop": true,
	"progressBar": true,
	"positionClass": "toast-bottom-right",
	"preventDuplicates": true,
	"onclick": null,
	"showDuration": 300,
	"hideDuration": 100,
	"timeOut": 2000,
	"extendedTimeOut": 1000,
	"showEasing": "swing",
	"hideEasing": "linear",
	"showMethod": "fadeIn",
	"hideMethod": "fadeOut"
}

//Display Error
const error = err =>
{
	const { status, responseJSON, statusText, message } = err;
	if (status > 399 && status < 500)
	{
		$.alert({
			title: "Ops!",
			content: `ERROR: ${responseJSON ? responseJSON.message : statusText}`,
			type: "red",
			icon: "fal fa-times-circle"
		});
	}
	else
	{
		$.alert({
            title: "Ops!",
            content: `Something went wrong, We're working on it.`,
            type: "red",
            icon: "fal fa-times-circle"
		});
	}
};

//String Formatting
const ucwords = (input) =>
{
    let words = input.split(/(\s|-)+/),
        output = [];

    for (let i = 0, len = words.length; i < len; i += 1)
    {
        output.push(words[i][0].toUpperCase() + words[i].toLowerCase().substr(1));
    }

    return output.join('');
}

//forms
const validateEmail = (email) =>
{
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

const mergeArrayObjects = (arr1,arr2) =>
{
    return arr1.map((item,i)=>
    {
        if(item.id === arr2[i].id)
            //merging two objects
            return Object.assign({},item,arr2[i])
    });
}

$.fn.btnSubmit = function(disabled = true)
{
	const form = this;

	form.find(`button[type='submit']`).attr("disabled", disabled);
}

$.fn.enable = function()
{
	this.attr("disabled", false);
}

$.fn.disable = function()
{
	this.attr("disabled", true);
}

$.fn.formFocus = function(name)
{
    setTimeout(()=> this.find(`[name="${name}"]`).focus(), 500);
}

$.fn.formName = function(name, value = null)
{
	if(value == null)
	{
	    return this.find(`[name="${name}"]`).val();
	}
	else
	{
	    this.find(`[name="${name}"]`).val(value);
	}
}

$.fn.formRadio = function(name, value = null)
{
	if(value == null)
	{
		return this.find(`input[name=${name}]:checked`).val();
	}
	else
	{
		this.find(`input:radio[name=${name}]`).val([value])
	}
}

//tables

$.fn.tableLoader = function()
{
	const thead = this.find('thead');
	const col_span = parseInt(thead.find('th:visible').length) || parseInt(thead.find('th').length);

	this.find('tbody').html(`<tr><td id='tdLoader' class='text-center' colspan=${col_span}><i class='fas fa-spinner fa-spin'></i> Loading data...</td></tr>`);
}

$.fn.tableEmpty = function(message = '')
{
	const thead = this.find('thead');
	const col_span = parseInt(thead.find('th').length) || parseInt(thead.find('th').length);

	this.find('tbody').html(`<tr><td class='text-center' colspan=${col_span}>${message || 'No data'}</td></tr>`);
}

$.fn.showEntries = function(show_form, show_to, total)
{
    this.html(`Showing <span class='show-from'>${show_form}</span> to <span class='show-to'>${show_to}</span> of <span class='total'>${total}</span> entries`);
}

//logout
$('#logout').on('click', () =>
{
	$.ajax({ url: baseUrl('remove-session') })
	.then(d =>
	{
		sessionStorage.removeItem('sms_token')
		window.location.replace(baseUrl('login'))
	}).fail(({status,responseJSON})=>
	{
		if (status < 500)
		{
			window.alert(`Error: ${responseJSON.message}`);
		}
		else
		{
			window.alert('Something went wrong, We\'re working on it.');
		}
	})
});
