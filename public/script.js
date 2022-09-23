document.addEventListener('DOMContentLoaded', () => {
    'use strict';
    const alert = document.querySelector('.alert');
    const alertClose = document.querySelector('.alert-close');

    alertClose && alertClose.addEventListener('click', () => {
        alert.classList.add('hide');
    })
    setTimeout(() => {
        alert.classList.add('hide');
    }, 6000)


    function pic(file) {
        var reg = /.+(\.jpeg|\.jpeg|\.gif)$/i;
        if (file == undefined) {
            return false;
        }
        return reg.test(file);
    };


})