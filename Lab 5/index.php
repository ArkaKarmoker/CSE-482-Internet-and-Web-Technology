<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>

    <h2>Form Validation</h2>
    <form id="myForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <span class="error" id="nameError"></span>
        <br><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <span class="error" id="usernameError"></span>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span class="error" id="passwordError"></span>
        <br><br>

        <label for="retypePassword">Re-type password:</label>
        <input type="password" id="retypePassword" name="retypePassword">
        <span class="error" id="retypePasswordError"></span>
        <br><br>

        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="Male"> Male
        <input type="radio" id="female" name="gender" value="Female"> Female
        <input type="radio" id="other" name="gender" value="Other"> Other
        <span class="error" id="genderError"></span>
        <br><br>

        <label>Programming skills:</label>
        <input type="checkbox" name="skills" value="Java"> Java
        <input type="checkbox" name="skills" value="Android"> Android
        <input type="checkbox" name="skills" value="Ruby"> Ruby
        <input type="checkbox" name="skills" value=".Net"> .Net
        <br><br>

        <label for="contact">Contact no.:</label>
        <input type="text" id="contact" name="contact">
        <span class="error" id="contactError"></span>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br><br>

        <label for="college">College:</label>
        <select id="college" name="college">
            <option value="">Select college</option>
            <option value="College A">College A</option>
            <option value="College B">College B</option>
        </select>
        <br><br>

        <!-- Add Remember Me checkbox -->
        <label for="rememberMe">Remember Me:</label>
        <input type="checkbox" id="rememberMe" name="rememberMe">
        <br><br>

        <input type="submit" value="Submit">
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script> <!-- Cookie library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Check if cookies exist and load them
            checkCookie();
    
            // Handle form submission
            $("#myForm").submit(function (event) {
                $(".error").text("");
                let isValid = true;
    
                let name = $("#name").val();
                if (name === "") {
                    $("#nameError").text("Name cannot be empty");
                    isValid = false;
                }
    
                let username = $("#username").val();
                if (username === "") {
                    $("#usernameError").text("Username cannot be empty");
                    isValid = false;
                } else if (/\s/.test(username)) {
                    $("#usernameError").text("Username cannot contain whitespace");
                    isValid = false;
                }
    
                let password = $("#password").val();
                if (password.length < 8 || password.length > 32) {
                    $("#passwordError").text("Password must be between 8 and 32 characters");
                    isValid = false;
                }
    
                let retypePassword = $("#retypePassword").val();
                if (password !== retypePassword) {
                    $("#retypePasswordError").text("Passwords do not match");
                    isValid = false;
                }
    
                if (!$("input[name='gender']:checked").val()) {
                    $("#genderError").text("Please select your gender");
                    isValid = false;
                }
    
                let contact = $("#contact").val();
                if (!/^\d+$/.test(contact)) {
                    $("#contactError").text("Contact no. must contain numbers only");
                    isValid = false;
                }
    
                if (isValid && $("#rememberMe").is(":checked")) {
                    savePreferences();
                }
    
                if (!isValid) {
                    event.preventDefault();
                }
            });
    
            function savePreferences() {
                // Get selected programming skills
                let skills = [];
                $("input[name='skills']:checked").each(function () {
                    skills.push($(this).val());
                });
                setCookie("skills", skills.join(","), 30);
    
                // Get selected college
                let college = $("#college").val();
                setCookie("college", college, 30);
            }
    
            function setCookie(cname, cvalue, exdays) {
                const d = new Date();
                d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
                let expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }
    
            function getCookie(cname) {
                let name = cname + "=";
                let decodedCookie = decodeURIComponent(document.cookie);
                let ca = decodedCookie.split(";");
                for (let i = 0; i < ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) === " ") {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) === 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }
    
            function checkCookie() {
                let skills = getCookie("skills");
                if (skills !== "") {
                    let skillsArray = skills.split(",");
                    $("input[name='skills']").each(function () {
                        if (skillsArray.includes($(this).val())) {
                            $(this).prop("checked", true);
                        }
                    });
                }
    
                let college = getCookie("college");
                if (college !== "") {
                    $("#college").val(college);
                }
            }
        });
    </script>
    
</body>
</html>
