const currentPage = document.body.getAttribute('data-page');

// href clicked active link start
const currentHTMLPage = window.location.href;
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(link => {
  if (currentHTMLPage.includes(link.getAttribute('href'))) {
    link.classList.add('active');
  }
});
// href clicked active link end

if (currentPage === 'page1') {
//product link start
    let product = document.getElementsByClassName('product');
    const rowLayout = document.getElementById('row-layout');
    const swiperLayout = document.getElementById('swiper-layout');
    const featPagination = document.getElementsByClassName('feat-pagination');

    let currentProduct = 0;

    function activeProduct(event,pElementId,swiElementId){
        const clickProduct = event.target;

        if(clickProduct.classList.contains('product-active')){
            return;
        }

        currentProduct = Array.from(product).indexOf(clickProduct);

        rowLayout.style.display = pElementId === 'rowLayout' ? 'flex' : 'none';
        swiperLayout.style.display = swiElementId === 'swiperLayout' ? 'block' : 'none';

        for (let pagination of featPagination){
            pagination.style.display = swiElementId === 'swiperLayout' ? 'block' : 'none';
        }

        localStorage.setItem('activeProduct', currentProduct);
        localStorage.setItem('displayRowLayout', pElementId === 'rowLayout' ? 'flex' : 'none');
        localStorage.setItem('displaySwiperLayout', swiElementId === 'swiperLayout' ? 'block' : 'none');
        localStorage.setItem('displayPagination', swiElementId === 'swiperLayout' ? 'block' : 'none');
    }

    // Check if there is stored state information in localStorage
    document.addEventListener('DOMContentLoaded', function () {
        const storedProduct = localStorage.getItem('activeProduct');
        if (storedProduct !== null) {
            // Check if the product already has the 'product-active' class
            const alreadyActive = product[storedProduct].classList.contains('product-active');

            // Apply the stored state information only if the product is not already active
            if (!alreadyActive) {
                // Remove 'product-active' class from all products
                for (let p of product) {
                    p.classList.remove('product-active');
                }

                // Add 'product-active' class to the stored product
                product[storedProduct].classList.add('product-active');

                // Apply the other stored state information
                rowLayout.style.display = localStorage.getItem('displayRowLayout');
                swiperLayout.style.display = localStorage.getItem('displaySwiperLayout');
                for (let pagination of featPagination) {
                    pagination.style.display = localStorage.getItem('displayPagination');
                }
            }
            window.location.hash = '#product';

            // Clear the stored state information from localStorage
            localStorage.removeItem('activeProduct');
            localStorage.removeItem('displayRowLayout');
            localStorage.removeItem('displaySwiperLayout');
            localStorage.removeItem('displayPagination');
        }
    });

//product link end

//swiper function start
function initSwiper() {
  const swiper = new Swiper('#swiper-layout', {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: '.feat-pagination',
      clickable: true,
    },

    breakpoints: {
      0: {
          slidesPerView: 1,
      },
      528: {
          slidesPerView: 2,
      },
      728: {
        slidesPerView: 3,
      }
    }
  });
}
//swiper function end

// Function to show/hide the pagination and initialize the slider based on screen width start
function handleSliderAndPagination() {
  const productPagination = document.querySelector('.product-pagination')
  const productRowLayout = document.querySelector('.product-row-layout');
  const productSwiperLayout = document.querySelector('.product-swiper-layout');
  const isMobile = window.innerWidth < 1000;

  productPagination.style.display = isMobile ? 'block' : 'none';
  productRowLayout.style.display = isMobile ? 'none' : 'flex';
  productSwiperLayout.style.display = isMobile ? 'block' : 'none';

  if (isMobile) {
    initSwiper();
  }
}
handleSliderAndPagination();
window.addEventListener('resize', handleSliderAndPagination);
// Function to show/hide the pagination and initialize the slider based on screen width end


//helmets container pre & next btn start
let currentIndex = 0;
function controller(x) {
    currentIndex += x;
    slideShow();
}
function slideShow() {
    const cardContainers = document.querySelectorAll('.card-container .row');

    // Hide all card containers
    cardContainers.forEach(container => {
        container.style.display = 'none';
    });

    // Handle wrapping around to the beginning or end
    if (currentIndex < 0) {
        currentIndex = cardContainers.length - 1;
    } else if (currentIndex >= cardContainers.length) {
        currentIndex = 0;
    }

    // Show the current group of card containers
    if (cardContainers[currentIndex]) {
        cardContainers[currentIndex].style.display = 'flex';
    }
}
slideShow();
//helmets container pre & next btn end

//jackets container pre & next btn start
let currentIndex2 = 0;
function controller2(y) {
    currentIndex2 += y;
    slideShow2();
}
function slideShow2() {
    const cardContainer2 = document.querySelectorAll('.card-container2 .row');

    // Hide all card containers
    cardContainer2.forEach(container2 => {
        container2.style.display = 'none';
    });

    // Handle wrapping around to the beginning or end
    if (currentIndex2 < 0) {
        currentIndex2 = cardContainer2.length - 1;
    } else if (currentIndex2 >= cardContainer2.length) {
        currentIndex2 = 0;
    }

    // Show the current group of card containers
    if (cardContainer2[currentIndex2]) {
        cardContainer2[currentIndex2].style.display = 'flex';
    }
}
slideShow2();
// //jackets container pre & next btn end

// //gloves container pre & next btn start
let currentIndex3 = 0;
function controller3(z) {
    currentIndex3 += z;
    slideShow3();
}
function slideShow3() {
    const cardContainer3 = document.querySelectorAll('.card-container3 .row');

    // Hide all card containers
    cardContainer3.forEach(container3 => {
        container3.style.display = 'none';
    });

    // Handle wrapping around to the beginning or end
    if (currentIndex3 < 0) {
        currentIndex3 = cardContainer3.length - 1;
    } else if (currentIndex3 >= cardContainer3.length) {
        currentIndex3 = 0;
    }

    // Show the current group of card containers
    if (cardContainer3[currentIndex3]) {
        cardContainer3[currentIndex3].style.display = 'flex';
    }
}
slideShow3();
//gloves container pre & next btn end

//rider slider btn start
new Glider(document.querySelector('.glider'), {
  slidesToScroll: 1,
  slidesToShow: 3,
  draggable: 5000,
  duration: 1,
  dots: '.dots',
  arrows: {
    prev: '.glider-prev',
    next: '.glider-next',
    duration: 1,
  },

  responsive : [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        duration: 1,
      }
    },
    {
      breakpoint: 820,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        duration: 1,
      }
    },
    {
      breakpoint: 640,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        duration: 1,
      }
    },
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        duration: 1,
      }
    },
    {
      breakpoint: 304,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        duration: 1,
      }
    },
    {
      breakpoint: 0,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        duration: 1,
      }
    }
  ]
});
//rider slider btn end


}
else if (currentPage === 'page2') {
// product size check start
let size = document.getElementsByClassName('size');
let currentSize = 0;

function activeSize(event,count){
  event.preventDefault();
  const clickSize = event.target;

  if(clickSize.classList.contains('size-active')){
    return;
  }

  for(let s of size){
    s.classList.remove('size-active');
  }

  clickSize.classList.add('size-active');
  currentSize = Array.from(size).indexOf(clickSize);

  const productLeft = document.querySelector('.product-left-count');
  productLeft.textContent = count;
}
// product size check end

// product details click start
let detailsText = document.getElementsByClassName('text-content');
const textParagraph = document.getElementById('text-paragraph');
const addInfo = document.getElementById('add-info');
const reviewsInfo = document.getElementById('reviews-info');
let currentDetails = 0;

function detailsClick(event,elementId){
  event.preventDefault();
  const clickText = event.target;

  if(clickText.classList.contains('text-active')){
    return;
  }
  for(let d of detailsText){
    d.classList.remove('text-active');
  }
  clickText.classList.add('text-active');
  currentDetails = Array.from(detailsText).indexOf(clickText);

  textParagraph.style.display = elementId === 'textParagraph' ? 'block' : 'none';
  addInfo.style.display = elementId === 'addInfo' ? 'block' : 'none';
  reviewsInfo.style.display = elementId === 'reviewsInfo' ? 'block' : 'none';
}
// product details click end

//review form show and hide start
$(document).ready(function(){
  $('#rev-toggle').click(function(){
    $('#rev-form').toggle();
    $('#rev-down').toggle();
    $('#rev-up').toggle();
  });
});
//review form show and hide end

}

// product view start
var swiper2 = new Swiper("#mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,
  freeMode: true,
  grabCursor: true,
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  pagination: {
    el: "#swiper-pagination",
    clickable: true,
  },

  breakpoints: {
    0: {
        slidesPerView: 1,
    },
    535: {
        slidesPerView: 2,
    },
    850: {
      slidesPerView: 3,
    }
  }
});
// product view end

// footer dropdown start
$(document).ready(function(){
    function toggleDropdown(btnId, contentId, downId, upId) {
      $(btnId).click(function(){
        $(contentId).toggle(1000);
        $(downId).toggle();
        $(upId).toggle();
      });
      $(contentId).hide();
    }

    toggleDropdown('#toggle-btn', '#drop-items', '#down', '#up');
    toggleDropdown('#toggle-btn2', '#drop-items2', '#down2', '#up2');
    toggleDropdown('#toggle-btn3', '#drop-items3', '#down3', '#up3');
  });
  // footer dropdown end
