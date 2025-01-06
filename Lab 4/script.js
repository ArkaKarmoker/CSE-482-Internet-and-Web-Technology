const persons = []; // this is an empty array
        const div_show = document.getElementById("div_show");

        function my_push() {
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const age = document.getElementById('age').value;

            if (firstName !== "" && lastName !== "" && age !== "") {
                const person = {
                    firstName: firstName,
                    lastName: lastName,
                    age: Number(age)
                };
                persons.push(person);
                div_show.innerHTML = "Pushed: " + JSON.stringify(person);
            } else {
                div_show.innerHTML = "Please fill in all fields.";
            }

            // Clear input fields
            document.getElementById('firstName').value = "";
            document.getElementById('lastName').value = "";
            document.getElementById('age').value = "";
        }

        function my_pop() {
            if (persons.length !== 0) {
                const poppedPerson = persons.pop();
                div_show.innerHTML = "Popped: " + JSON.stringify(poppedPerson);
            } else {
                div_show.innerHTML = "No persons to pop.";
            }
        }

        function my_show() {
            if (persons.length !== 0) {
                div_show.innerHTML = "Persons: " + JSON.stringify(persons);
            } else {
                div_show.innerHTML = "Empty";
            }
        }