function confirmDelete() {

    return confirm(
        "Are you sure you want to delete this contact?"
    );
}


function validateForm() {

    let name = document.getElementById("name").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let email = document.getElementById("email").value.trim();

    if (name === "") {

        alert("Please enter your name.");
        return false;

    }

    if (phone === "") {

        alert("Please enter your phone number.");
        return false;

    }

    if (!/^[0-9]{10}$/.test(phone)) {

        alert("Phone number must contain exactly 10 digits.");
        return false;

    }

    if (email === "") {

        alert("Please enter your email.");
        return false;

    }

    alert("Form submitted successfully!");

    return true;
}


function clearForm() {

    document.getElementById("name").value = "";
    document.getElementById("phone").value = "";
    document.getElementById("email").value = "";

}


function searchContacts() {

    let input = document
        .getElementById("search")
        .value
        .toLowerCase();

    let table = document.getElementById("contactTable");

    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {

        let text = rows[i].innerText.toLowerCase();

        if (text.includes(input)) {

            rows[i].style.display = "";

        } else {

            rows[i].style.display = "none";

        }
    }
}