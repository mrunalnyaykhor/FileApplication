// Function to update date and time
function updateDateTime() {
    const now = new Date();

    // Date
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = now.toLocaleDateString('en-US', options);
    document.getElementById('date').textContent = formattedDate;

    // Time
    const formattedTime = now.toLocaleTimeString('en-US');
    document.getElementById('time').textContent = formattedTime;
}

// Update date and time every second
setInterval(updateDateTime, 1000);
