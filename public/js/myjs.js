$(document).ready(function() {

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')	},
        cache: false
    });

    // Commonly user variables
    var winHeight = window.innerHeight;
    var winWidth = window.innerWidth;
    var screenHeight = screen.availHeight;
    var screenWidth = screen.availWidth;

    // Since fixed height for nav, add nav height to container
    $('#content_container').css({'margin-top':$('nav').height() + 'px'});

    // Animations initialization
    new WOW().init();

    // Initialize MDB select
    $('.mdb-select').materialSelect();

    // Work around for select search not working
    $(".mdb-select").find(".search").on("click", function (e) {
        e.preventDefault();
        $(this).focus();
    });

    $('.datepicker').datepicker({
        // Escape any “rule” characters with an exclamation mark (!).
        format: 'mm/dd/yyyy',
        formatSubmit: 'yyyy-mm-dd',
    });

    $('#timepicker, .timepicker').pickatime({
        // 12 or 24 hour
        twelvehour: true,
        autoclose: true,
        default: '18:00',
    });

    // Dropdown Init
    $('.dropdown-toggle').dropdown();

    // Disable submit button once selected
    $('body').on('click', '.add_contact_form input[type="submit"], #contact_add  input[type="submit"]',  function(e) {
        // e.preventDefault();

        $(this).attr('disbaled', true);
    });

    // Remove Modal
    $('body').on('click', '.close, .cancelBtn', function(e) {
        e.preventDefault();
        $('.modal').removeClass('show');

        // If this modal is the remove media objects modal
        if($(this).hasClass('dismissProperyMedia')) {
            // Remove all media objects from the modal
            $(this).parent().next().find('form .row').empty();
        }

        setTimeout(function() {
            $('.modal').removeClass('d-block');
            $('body').removeClass('modal-open');
            $(".modal-backdrop.fade.show").remove();
        }, 500);
    });

    // Button toggle switch
    $('body').on("click", "button", function(e) {
        if(!$(this).hasClass('btn-primary') || !$(this).hasClass('btn-danger')) {
            if($(this).children().val() == "Y") {
                $(this).addClass('active btn-success').removeClass('btn-blue-grey').children().attr("checked", true);
                $(this).siblings().addClass('btn-blue-grey').removeClass('active btn-danger').children().removeAttr("checked");

                // Show the other options for payments
                if($(this).hasClass('collectPayment')) {
                    $('#payment_collection_group').slideDown();
                }
            } else if($(this).children().val() == 'N') {
                $(this).addClass('active btn-danger').removeClass('btn-blue-grey').children().attr("checked", true);
                $(this).siblings().addClass('btn-blue-grey').removeClass('active btn-success').children().removeAttr("checked");

                // Remove the additional options for payments
                if($(this).hasClass('collectPayment')) {
                    $('#payment_collection_group').slideUp();
                }
            }
        }

        if($('#pricing_component').length >= 1) {
            pricingUpdate();
        }
    });

    // Click on input button when user goes to change
    // contact picture
    $('body').on('click', '.memberImg button', function(e) {
        e.preventDefault();
        $('.memberImg input').click();
    });

    // Call function for file preview when uploading
    // new contact image
    $('.memberImg input').change(function () {
        memberImgPreview(this);
        fileLoaded(this);
    });

    // Call function for file preview when uploading
    // new images to properties page
    $("#upload_photo_input").change(function () {
        filePreview(this);
        fileLoaded(this);
    });

    // Reset date on the hit counter
    $('body').on('click', 'button.resetCounterBtn', function() {
        event.preventDefault();

        $.ajax({
            url: "/reset_count",
            method: "POST",
            contentType: false,
            processData: false,
            cache: false,

            success: function(data) {
                var d = new Date();
                // Display a success toast
                toastr.success(data);
                $('.settingsCounter').text('0');
                $('.settingsCounterDate').text((d.getMonth() +1) + '/' + d.getDay() + '/' + d.getFullYear());
            },
        });

        return false;
    });

});

//Update the charging price per selection
function pricingUpdate() {
    let collectPayment = $("[name='collect_payments']:checked").val();
    let merchantAccount = $("[name='merchant_account']:checked").val();
    var totalCost = $('#payment_amount');

    if(collectPayment == 'Y' && merchantAccount == 'Y') {
        totalCost.text('850.00');
    } else if(collectPayment == 'N' && merchantAccount == 'Y') {
        //This is where we will make the button display 'No'
        //for the merchant_account toggle
        $('#payment_collection_group .merchantAccountNo').addClass('active btn-danger').removeClass('btn-blue-grey').children().attr("checked", true);
        $('#payment_collection_group .merchantAccountNo').siblings().addClass('btn-blue-grey').removeClass('active btn-success').children().removeAttr("checked");
        totalCost.text('500.00');
    } else if(collectPayment == 'Y' && merchantAccount == 'N') {
        totalCost.text('750.00');
    } else if(collectPayment == 'N' && merchantAccount == 'N') {
        //Shouldd't have to do anything here since both are no
        //Just reset total cost back to 500.00
        totalCost.text('500.00');
    }
}

//Check to see if the file has been loaded
//If so then remove modal
function fileLoaded(input) {
    var imagePreview = setInterval(function() {
        if($('.imgPreview').length == input.files.length) {
            $('.loadingSpinner, .modal-backdrop')
                .css({'display' : 'none'})
                .removeClass('show')
                .addClass('hide');
            $('body')
                .removeClass('modal-open');

            clearInterval(imagePreview);
        }
    }, 1000);
    var avatarPreview = setInterval(function() {
        if($('.avatarPreview').length == input.files.length) {
            $('.loadingSpinner, .modal-backdrop')
                .css({'display' : 'none'})
                .removeClass('show')
                .addClass('hide');
            $('body')
                .removeClass('modal-open');

            clearInterval(avatarPreview);
        }
    }, 1000);
}

// Preview images before being uploaded on images page and new location page
function filePreview(input) {
    $('.loadingSpinner').find('p').text('Adding Image/Video').ready(function() {
        $('.loadingSpinner').modal('show');
    });

    if(input.files && input.files[0]) {
        if(input.files.length > 1) {
            var imgCount = input.files.length
            $('.imgPreview').parent().remove();

            for(x=0; x < imgCount; x++) {
                if($('.uploadsView').length < 1) {
                    if(input.files[x].type.indexOf('video') != -1) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('<div class="d-block mx-auto mb-2 d-sm-inline-block" style="height:250px; width:250px; position:relative"><video controls class="imgPreview" style="max-height:250px;"><source src="' + e.target.result + '" /></video></div>').appendTo($('.currentCarImageDiv').find('.row'));
                        }
                        reader.readAsDataURL(input.files[x]);
                    } else {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('<div class="col-4 my-1"><img class="imgPreview img-thumbnail h-100 w-100" src="' + e.target.result + '"/></div>').appendTo($('.currentCarImageDiv').find('.row'));
                        }
                        reader.readAsDataURL(input.files[x]);
                    }
                } else {
                    if(input.files[x].type.indexOf('video') != -1) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('<div class="col-6 my-1"><video controls class="imgPreview" style="max-height:250px;"><source src="' + e.target.result + '" /></video></div>').appendTo('.uploadsView');
                        }
                        reader.readAsDataURL(input.files[x]);
                    } else {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('<div class="col-4 my-1"><img class="imgPreview img-thumbnail" src="' + e.target.result + '" width="450" height="300"/></div>').appendTo($('.uploadsView').find('.row'));
                        }
                        reader.readAsDataURL(input.files[x]);
                    }
                }
            }
        } else {
            var reader = new FileReader();
            $('.imgPreview').parent().remove();

            if($('.uploadsView').length < 1) {
                if(input.files[0].type.indexOf('video') != -1) {
                    reader.onload = function (e) {
                        $('<div class="d-block mx-auto mb-2 d-sm-inline-block" style="height:250px; width:250px; position:relative"><video controls class="imgPreview" style="max-height:250px;"><source src="' + e.target.result + '" /></video></div>').insertAfter('.currentCarImageDiv:last-of-type');
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    reader.onload = function (e) {
                        $('<div class="col-4 my-1"><img class="imgPreview img-thumbnail h-100 w-100" src="' + e.target.result + '"/></div>').appendTo($('.currentCarImageDiv').find('.row'));
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            } else {
                if(input.files[0].type.indexOf('video') != -1) {
                    reader.onload = function (e) {
                        $('<div class="col-6 my-1"><video controls class="imgPreview" style="max-height:250px;"><source src="' + e.target.result + '" /></video></div>').appendTo('.uploadsView');
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    reader.onload = function (e) {
                        $('<div class="col-4 my-1"><img class="imgPreview img-thumbnail" src="' + e.target.result + '" width="450" height="300"/></div>').appendTo($('.uploadsView').find('.row'));
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        }
    }
}

function cookieCheck() {
    var check_cookie = document.cookie.split(';');
    var findCookie = false;
    var cook = '';
    var cname = '';
    var cval = '';

    check_cookie.forEach(function (value, index) {
        cook = value.split('=');
        cname = cook[0];
        cval = cook[1];

        if(cname == 'company_recruiter') {
            document.getElementById('switch_view_btn').innerText = 'See Small Business Portfolio';
            document.getElementById('switch_view_btn').href = '/small_business/portfolio';
        } else if(cname == 'small_business') {
            document.getElementById('switch_view_btn').innerText = 'See Company Recruiter Portfolio';
            document.getElementById('switch_view_btn').href = '/recruiter/portfolio';
        }
    });

    return findCookie;
}

// Preview contact image before uploading
function memberImgPreview(input) {
    var backdrop = '<div class="modal-backdrop show fade"></div>';
    $(backdrop).appendTo('body');
    $('.loadingSpinner')
        .css({'display' : 'block'})
        .addClass('show')
        .removeClass('hide')
        .find('p')
        .text('Adding Image/Video');
    $('body')
        .addClass('modal-open');

    var reader = new FileReader();

    reader.onload = function (e) {
        $('.memberImg img').attr('src', e.target.result).addClass('avatarPreview');
    }
    reader.readAsDataURL(input.files[0]);
}

// Initialize tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

// MDB Lightbox Init
$(function () {
    $("#mdb-lightbox-ui").load("/addons/mdb-lightbox-ui.html");
});

/* init Jarallax */
jarallax(document.querySelectorAll('.jarallax'));

jarallax(document.querySelectorAll('.jarallax-keep-img'), {
    keepImg: true,
});