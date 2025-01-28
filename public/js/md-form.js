document.addEventListener("DOMContentLoaded", function () {
    let inputFields = document.getElementsByTagName('input');
    let textareaFields = document.getElementsByTagName('textarea');
    let file_inputs = document.querySelectorAll('input[type="file"]');

    for (let i = 0; i < inputFields.length; i++) {
        if ((inputFields[i].type !== 'file') && !(inputFields[i].hasAttribute('disabled'))) {
            if (inputFields[i].hasAttribute('placeholder') && inputFields[i].getAttribute('placeholder') != '') {
                inputFields[i].nextElementSibling.className = 'active';
            }
        }
    }

    for (let i = 0; i < textareaFields.length; i++) {
        if (textareaFields[i].hasAttribute('placeholder') && textareaFields[i].getAttribute('placeholder') != '') {
            textareaFields[i].nextElementSibling.className = 'active';
        }
    }

    //File input animation
    if (typeof (file_inputs) != 'undefined' && file_inputs != null) {
        for (let x = 0; x < file_inputs.length; x++) {
            file_inputs[x].addEventListener('change', function () {

                if (this.value !== null && this.value !== '') {
                    let document_input_icon = file_inputs[x].previousElementSibling;
                    let document_text_display = file_inputs[x].closest('.file-field.d-flex').children.item(1).firstElementChild;

                    document_input_icon.classList.add('border-success');
                    document_input_icon.classList.remove('border-danger');
                    document_text_display.setAttribute('placeholder', this.value);
                }
            });
        }
    }
});

function activateLabel(form_field) {
    form_field.nextElementSibling.className = 'active';
}

function deactivateLabel(form_field) {
    if (form_field.hasAttribute('placeholder')) {
        if (form_field.getAttribute('placeholder') == '') {
        }
    } else {
        if (form_field.value === '') {
            form_field.nextElementSibling.className = '';
        }
    }
}