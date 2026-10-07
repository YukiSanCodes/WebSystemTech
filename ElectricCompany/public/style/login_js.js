let body = document.querySelector('body'); 
let isHoldingClick = false;

// Handle mouse down event
document.onmousedown = function(e) {
    isHoldingClick = true;
    createAndAppendElement(e);
}

// Handle mouse up event
document.onmouseup = function() {
    isHoldingClick = false;
}

// Handle mouse move event
document.onmousemove = function(e){
    if (isHoldingClick) {
        createAndAppendElement(e);
    }
    // Adjust background position based on mouse movement
    body.style.backgroundPositionX = e.pageX / -4 + 'px';
    body.style.backgroundPositionY = e.pageY / -4 + 'px';
}

// Get the container and buttons
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

// Toggle container class on button click
registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

// Remove alert after 3 seconds on DOM content loaded
document.addEventListener('DOMContentLoaded', () => {
    const alert = document.querySelector('.alert');
    if (alert) {
        setTimeout(() => {
            alert.remove(); // Remove alert from DOM after 3 seconds
        }, 3000); // Matches the animation duration
    }
});

document.addEventListener('DOMContentLoaded', () => {
    let isHoldingClick = false;
    const body = document.querySelector('body');
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');
    const alert = document.querySelector('.alert');

    // Handle mouse events for dynamic element creation
    const createAndAppendElement = (e) => {
        // Your element creation logic here
    };

    document.addEventListener('mousedown', (e) => {
        isHoldingClick = true;
        createAndAppendElement(e);
    });

    document.addEventListener('mouseup', () => {
        isHoldingClick = false;
    });

    document.addEventListener('mousemove', (e) => {
        if (isHoldingClick) {
            createAndAppendElement(e);
        }
        body.style.backgroundPositionX = `${e.pageX / -4}px`;
        body.style.backgroundPositionY = `${e.pageY / -4}px`;
    });

    // Toggle container class on button clicks
    registerBtn?.addEventListener('click', () => container?.classList.add('active'));
    loginBtn?.addEventListener('click', () => container?.classList.remove('active'));

    // Auto-remove alert after 3 seconds
    if (alert) {
        setTimeout(() => alert.remove(), 3000);
    }
});

function togglePassword(inputId, iconId) {
    const passwordField = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    } else {
        passwordField.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    }
}




