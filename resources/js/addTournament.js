
/**
 * Counter to keep track of the number of user details entered in the tournament form.
 * @type {number}
 */
let userDetailCount = 1;

/**
 * Creates and appends a new user detail form section to the DOM.
 * Each section includes input fields for user name and email.
 * The fields are uniquely identified using a counter to ensure proper form submission.
 *
 * @function createNewUserDetailFields
 * @requires jQuery
 * @global {number} userDetailCount - Counter tracking number of user detail sections
 * @returns {void}
 *
 */
function createNewUserDetailFields() {
 let newUserDetail = `
         <div class="userDetail bg-indigo-50 p-2 flex flex-col rounded-md">
            <div class="flex justify-between">
                <h2 class="font-bold">User Detail</h2>
                <button type="button" class="removeUserDetailBtn bg-pink-700 text-indigo-50 rounded-md h-[24px] w-[24px]">X</button>
            </div>
            <div class="flex flex-col">
                <label for="user.${userDetailCount}.name">Name</label>
                <input name="user[${userDetailCount}][name]" type="text" class="border border-indigo-200 p-1" id="user.${userDetailCount}.name">
            </div>
                <div class="flex flex-col">
                <label for="user.${userDetailCount}.email">Email</label>
                <input type="email" name="user[${userDetailCount}][email]" class="border border-indigo-200 p-1" id="user.${userDetailCount}.email">
            </div>
        </div>
    `;

    $('#userDetailsContainer').append(newUserDetail);

    // Add validation rules to the newly generated input fields
    $('#addTournamentForm').validate().settings.rules[`user[${userDetailCount}][name]`] = {
        required: true,
        minlength: 3,
    };

    $('#addTournamentForm').validate().settings.rules[`user[${userDetailCount}][email]`] = {
        required: true,
        email: true,
    };

    // Add custom validation messages to the newly generated input fields
    $('#addTournamentForm').validate().settings.messages[`user[${userDetailCount}][name]`] = {
        required: "Please enter a name",
        minlength: "Name must be 3 or more characters long",
    };

    $('#addTournamentForm').validate().settings.messages[`user[${userDetailCount}][email]`] = {
        required: "Please enter an email",
        maxlength: "Entered email must be a valid email address",
    };

    userDetailCount++;
}

/**
 * Removes the closest parent element with class 'userDetail' from the DOM
 * when triggered. Uses jQuery to find and remove the element.
 * @function removeUserDetailFields
 * @this {HTMLElement} The element that triggered the removal
 * @returns {void}
 */
function removeUserDetailFields() {
    $(this).closest('.userDetail').remove();
}

$(document).on('click', '#addUserBtn', createNewUserDetailFields);

$(document).on("click", '.removeUserDetailBtn', removeUserDetailFields);

$('#addTournamentForm').validate({
    rules: {
        "user[0][name]": {
            required: true,
            minlength: 3,
        },
        "user[0][email]": {
            required: true,
            email: true,
        },
    },
    messages: {
        "user[0][name]": {
            required: "Please enter a name",
            minlength: "Name must be 3 or more characters long",
        },
         "user[0][email]": {
            required: "Please enter an email",
            email: "Entered email must be a valid email address",
        },
    },
});
