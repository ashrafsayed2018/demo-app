const login_container = document.querySelector('.login-container')
const sign_in_btn = document.querySelector('#sign-in-btn')
const sign_up_btn = document.querySelector('#sign-up-btn')

// event when click sign up btn

sign_up_btn.addEventListener('click', () => {
    login_container.classList.add('sign_up_mode');
})
// event when click sign in btn
sign_in_btn.addEventListener('click', () => {
    login_container.classList.remove('sign_up_mode')
})
