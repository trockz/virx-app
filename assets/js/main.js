$(document).ready(function () {
    $('.application-form fieldset:first-child').fadeIn('slow');

    $('.application-form input[type="text"]').on('focus', function () {
        $(this).removeClass('input-error');
    });

    // next step
    $('.application-form .btn-next').on('click', function () {
        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;

        parent_fieldset.find('input[type="text"],input[type="date"],select,input[type="checkbox"],input[type="email"]').each(function () {
            if ($(this).val() == "") {
                $(this).addClass('input-error');
                next_step = false;
            } else {
                $(this).removeClass('input-error');
            }
        });

        if (next_step) {
            parent_fieldset.fadeOut(400, function () {
                $(this).next().fadeIn();
            });
        }

    });

    // previous step
    $('.application-form .btn-previous').on('click', function () {
        $(this).parents('fieldset').fadeOut(400, function () {
            $(this).prev().fadeIn();
        });
    });

    // submit
    $('.application-form').on('submit', function (e) {
        e.preventDefault();

        var e = false;

        $(this).find('input[type="text"],input[type="email"]').each(function () {
            if ($(this).val() == "") {
                e = true;
                $(this).addClass('input-error');
            } else {
                $(this).removeClass('input-error');

            }
        });

        if (!e) {

            $.ajax({
                type: "POST",
                url: './user/adduser',
                data: $("#frm").serialize(), // serializes the form's elements.
                success: function (data) {
                    populate_data(data); // show response from the php script.
                },
                error: function () {
                    alert("error");
                }
            });
        }

    });

}); // JavaScript Document


function getUser(id){
            $.ajax({
                type: "GET",
                url: './user/getuser/'+id,
                success: function (data) {
                    populate_data(data); // show response from the php script.
                },
                error: function () {
                    alert("error");
                }
            });
}
function populate_data(data) {
    $("#xfirstname").html("").append(data.firstname);
    $("#xlastname").html("").append(data.lastname);
    $("#xage").html("").append(data.age);
    $("#expcom").html("").append(data.spending_table);
}


function getUsers() {
    $.ajax({
        type: "GET",
        url: './user/getusers',
        success: function (data) {
            var x = $("#user-list tbody");
            x.html("");

            $(data).each(function (inx, elem) {
                x.append(
                    `
                            <tr>
                                <td>`+ elem.firstname + `</td>
                                <td>`+ elem.lastname + `</td>
                                <td>`+ elem.age + `</td>
                                <td>`+ elem.city + `</td>
                                <td>`+ elem.country + `</td>
                                <td><a class="btn btn-priary view" data-id="`+ elem.id + `">View</a></td>
                            </tr>
                            `
                );
            });

        },
        error: function () {
            alert("error");
        }
    });
}



