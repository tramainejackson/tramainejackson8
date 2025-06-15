import {Input, Select, Datepicker, Animate, initMDB} from './mdb.es.min.js';

function showSponsor(btn) {
    let confirmationInput = btn.nextElementSibling.cloneNode();
    let sponsorForm = document.getElementsByTagName('form');

    if(sponsorForm.length > 0) {
        sponsorForm = document.getElementsByTagName('form')[0];
        sponsorForm.appendChild(confirmationInput);
    }
}

function submitSponsor() {
    let sponsorForm = document.getElementsByTagName('form');
    let errorBag = 0;

    if(sponsorForm.length > 0) {
        sponsorForm = document.getElementsByTagName('form')[0];

        if(sponsorForm.querySelector('#parent_first_name').value == '' || sponsorForm.querySelector('#parent_first_name') == null) {
            errorBag++;
        }
        if(sponsorForm.querySelector('#parent_last_name').value == '' || sponsorForm.querySelector('#parent_last_name') == null) {
            errorBag++;
        }
        if((sponsorForm.querySelector('#parent_email').value == '' && sponsorForm.querySelector('#parent_phone').value == '')
            || (sponsorForm.querySelector('#parent_email') == null && sponsorForm.querySelector('#parent_phone') == null)) {
            errorBag++;
        }

        if(errorBag == 0) {
            window.open("https://cash.app/$tramaine1986/150", "_blank");

            if(sponsorForm.querySelector('#sponsor_company').value == '' || sponsorForm.querySelector('#sponsor_company') == null) {
                sponsorForm.querySelector('#sponsor_company').value = 'Company ' + sponsorForm.querySelector('#parent_first_name').value + ' ' + sponsorForm.querySelector('#parent_last_name').value;
            }

            sponsorForm.submit();
        } else {
            if(sponsorForm.querySelector('#parent_first_name').value == '' || sponsorForm.querySelector('#parent_first_name') == null) {
                alert('Please add a first name.');
            } else if(sponsorForm.querySelector('#parent_last_name').value == '' || sponsorForm.querySelector('#parent_last_name') == null) {
                alert('Please add a last name.');
            } else if((sponsorForm.querySelector('#parent_email').value == '' && sponsorForm.querySelector('#parent_phone').value == '')
                || (sponsorForm.querySelector('#parent_email') == null && sponsorForm.querySelector('#parent_phone') == null)) {
                alert('Please add an email address or phone number.');
            } else {
                alert('Please fix errors before proceeding.');
            }
        }
    }
}

export {showSponsor}
export {submitSponsor}

// function selectSwitch(btn) {
//     let btnParent = btn.parentElement;
//     let yesBtn = btnParent.children[0];
//     let yesLabel = btnParent.children[1];
//
//     if (yesLabel.classList.contains('btn-outline-white')) {
//         yesBtn.value += '_yes';
//         yesLabel.classList.add('btn-primary');
//         yesLabel.classList.remove('btn-outline-white');
//     } else {
//         yesBtn.setAttribute('checked', 'false');
//         yesBtn.value = yesBtn.value.replace('_yes', '');
//         yesLabel.classList.remove('btn-primary');
//         yesLabel.classList.add('btn-outline-white');
//     }
//
//     console.log(yesBtn.value);
// }

// function radioSwitch(btn) {
//     let btnParent = btn.parentElement;
//     let yesBtn = btnParent.children[0];
//     let yesLabel = btnParent.children[1];
//     let noBtn = btnParent.children[2];
//     let noLabel = btnParent.children[3];
//
//     if (btn === yesBtn) {
//         if (!btn.hasAttribute('checked')) {
//             yesBtn.setAttribute('checked', true);
//             yesLabel.classList.add('btn-success');
//             yesLabel.classList.remove('btn-outline-success');
//
//             noBtn.removeAttribute('checked');
//             noLabel.classList.remove('btn-success');
//             noLabel.classList.add('btn-outline-success');
//         }
//     } else {
//         if (!btn.hasAttribute('checked')) {
//             noBtn.setAttribute('checked', 'true');
//             noLabel.classList.add('btn-success');
//             noLabel.classList.remove('btn-outline-success');
//
//             yesBtn.removeAttribute('checked');
//             yesLabel.classList.remove('btn-success');
//             yesLabel.classList.add('btn-outline-success');
//         }
//     }
// }
