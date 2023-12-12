document.getElementById('register').addEventListener('click', validate)

let success = true

function validate(e) {
    e.preventDefault()

    let variables = ['username', 'email', 'password', 'age', 'male', 'female', 'address', 'toc']
    let labels = ['username', 'email', 'password', 'age', 'gender', 'address', 'toc']
    let data = new Object()
    let errors = new Object()

    for (let i = 0; i < variables.length; ++i) {
        if (['male', 'female', 'toc'].includes(variables[i])) {
            data[variables[i]] = document.getElementById(variables[i]).checked
        }
        else
            data[variables[i]] = document.getElementById(variables[i]).value
    }

    for (let i = 0; i < labels.length; ++i) {
        errors[labels[i]] = document.getElementById(labels[i].concat('-error'))
        setError(errors[labels[i]], '')
    }

    success = true
    // Username validation
    if (data['username'].length == 0) {
        setError(errors['username'], 'Username cannot be empty.')
    }
    else if (data['username'].length > 32) {
        setError(errors['username'], 'Username cannot be greater than 32 characters.')
    }

    //Email validation
    if (data['email'].length == 0) {
        setError(errors['email'], 'Email cannot be empty.')
    }
    else if (!data['email'].endsWith('.com') || !data['email'].includes("@")) {
        setError(errors['email'], 'Invalid email format provided.')
    }

    //Password validation
    if (data['password'].length == 0) {
        setError(errors['password'], 'Password cannot be empty.')
    }
    else if (data['password'].length < 16 || data['password'].length > 64) {
        setError(errors['password'], 'Password must be between 16 to 64 characters long.')
    }
    else if (!hasNumbersCharactersSpecial(data['password'])) {
        setError(errors['password'], 'Password must contain letters, numbers, and symbols.')
    }

    //Age validation
    if (data['age'] == '') {
        setError(errors['age'], 'Age cannot be empty.')
        console.log(data['age'])
    }
    else if (data['age'] < 0 || data['age'] > 120) {
        setError(errors['age'], 'Invalid age range provided.')
    }

    //Gender verification
    if (data['male'] != true && data['female'] != true) {
        setError(errors['gender'], 'Please select your gender.')
    }

    // Address validation
    if (data['address'].length == 0) {
        setError(errors['address'], 'Address cannot be empty.')
    }
    else if (data['address'].length > 64) {
        setError(errors['address'], 'Address cannot be greater than 64 characters.')
    }

    //TOC validation
    if (data['toc'] != true) {
        setError(errors['toc'], 'You must accept the agreements to continue.')
    }

    if (success) {
        let modal = document.getElementById('success-popup')
        let message = document.getElementById('success-message')
        message.innerHTML = `Successfully registered! Welcome to ILKEA ${data['username']}!`
        modal.style.display = 'flex';
        
        setTimeout(redirect, 8000)
    }
}

function redirect() {
    window.location.href = 'home.html'
}

function setError(el, string) {
    el.innerHTML = string
    success = false
}

function isNumeric(c) {
    return (c >= '0' && c <= '9')
}

function isAlphabetic(c) {
    c = c.toLowerCase()
    return (c >= 'a' && c <= 'z')
}

function hasNumbersCharactersSpecial(str) {
    let hasAlphabet = false, hasNumeric = false, hasSpecial = false
    for (let i = 0; i < str.length; ++i) {
        let alphabetic = isAlphabetic(str[i])
        let numeric = isNumeric(str[i])
        hasAlphabet = hasAlphabet || alphabetic
        hasNumeric = hasNumeric || numeric
        hasSpecial = hasSpecial || (!alphabetic && !numeric)
    }
    return hasAlphabet && hasNumeric && hasSpecial
}