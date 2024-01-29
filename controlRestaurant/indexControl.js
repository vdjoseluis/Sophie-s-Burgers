function customers() {
    document.querySelector('#customers').classList.remove('d-none');
    document.querySelector('#orders').classList.add('d-none');
    document.querySelector('#bookings').classList.add('d-none');
}
function orders() {
    document.querySelector('#orders').classList.remove('d-none');
    document.querySelector('#customers').classList.add('d-none');
    document.querySelector('#bookings').classList.add('d-none');
}
function bookings() {
    document.querySelector('#bookings').classList.remove('d-none');
    document.querySelector('#customers').classList.add('d-none');
    document.querySelector('#orders').classList.add('d-none');
}