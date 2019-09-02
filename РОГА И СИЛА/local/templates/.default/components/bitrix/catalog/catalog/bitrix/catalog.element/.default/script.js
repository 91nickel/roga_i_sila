/*перенести в скрипт компонента*/
$(document).ready(function() {
    $(".slide_panel").click(function() {
        $(this).toggleClass("show");
        var slide_block = $(this).siblings(".slide_block");

        if ($(this).hasClass("show")) {
            slide_block.slideDown("1000");
        } else {
            slide_block.slideUp("1000");
        }
    });
})

//Скрипт слайдера перенести в компонент
$(document).ready(function() {
    $('.b-product-photo__list').bxSlider({
        pagerCustom: '.b-product-photo__thumbnail',
        controls: false,
        useCSS: false,
        mode: 'fade'
    });
});

document.addEventListener('DOMContentLoaded', () => {
    console.log('Hello World');
    console.log(getImages());
    getControls();
    slidePanels();
})

function getImages(count = 0) {
    const images = document.querySelectorAll('.b-product-photo__list-item');
    images.forEach((el, i) => {
        el.style.display = '';
    })
    images.forEach((el, i) => {
        if (i !== count) {
            el.style.display = 'none';
        }
    })
}

function getControls() {
    const controlPanel = document.querySelector('.b-product-photo__thumbnail');
    if (controlPanel) {
        controlPanel.addEventListener('click', (e) => {
            e.preventDefault();
            if (e.target.parentElement.tagName = 'A') {
                getImages(+e.target.parentElement.dataset.slideIndex);
            }
        })
    }
}

function slidePanels() {
    const containers = document.querySelectorAll('.slide_box');
    if (containers) {
        containers.forEach((el) => {
            el.addEventListener('click', (e) => {
                el.querySelector('.slide_panel').classList.toggle('show');
                el.querySelector('.slide_block').style.display = el.querySelector('.slide_block').style.display === 'block' ? 'none' : 'block';
            })
        })
    }
}