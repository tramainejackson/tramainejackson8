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

function radioSwitch(btn) {
    let btnParent = btn.parentElement;
    let yesBtn = btnParent.children[0];
    let yesLabel = btnParent.children[1];
    let noBtn = btnParent.children[2];
    let noLabel = btnParent.children[3];

    if (btn === yesBtn) {
        if (!btn.hasAttribute('checked')) {
            yesBtn.setAttribute('checked', true);
            yesLabel.classList.add('btn-success');
            yesLabel.classList.remove('btn-outline-success');

            noBtn.removeAttribute('checked');
            noLabel.classList.remove('btn-success');
            noLabel.classList.add('btn-outline-success');
        }
    } else {
        if (!btn.hasAttribute('checked')) {
            noBtn.setAttribute('checked', 'true');
            noLabel.classList.add('btn-success');
            noLabel.classList.remove('btn-outline-success');

            yesBtn.removeAttribute('checked');
            yesLabel.classList.remove('btn-success');
            yesLabel.classList.add('btn-outline-success');
        }
    }
}