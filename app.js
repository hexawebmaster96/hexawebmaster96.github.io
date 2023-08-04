const hamburger=document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu=document.querySelector('.header .nav-bar .nav-list ul');
const menu_item=document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header=document.querySelector('.header.container');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if(scroll_position > 60){
		header.style.backgroundColor = '#29323c';
	}
	else{
		header.style.backgroundColor = 'transparent';
	}
});

menu_item.forEach(item => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});

const toggleButton = document.querySelector('.toggle-button');
const additionalInfo = document.querySelector('.additional-info');

toggleButton.addEventListener('click', () => {
  additionalInfo.classList.toggle('active');
});

const slidesContainer = document.querySelector('.slider .slides-container');
const slides = document.querySelectorAll('.slider .slide');
const prevBtn = document.querySelector('.slider .prev');
const nextBtn = document.querySelector('.slider .next');
let currentIndex = 0;
let autoSlideInterval;

function showSlide(index) {
  slidesContainer.style.transform = `translateX(-${index * 100}%)`;
}

function showNextSlide() {
  currentIndex = (currentIndex + 1) % slides.length;
  showSlide(currentIndex);
}

function showPrevSlide() {
  currentIndex = (currentIndex - 1 + slides.length) % slides.length;
  showSlide(currentIndex);
}

prevBtn.addEventListener('click', () => {
  clearInterval(autoSlideInterval);
  showPrevSlide();
});

nextBtn.addEventListener('click', () => {
  clearInterval(autoSlideInterval);
  showNextSlide();
});

function startAutoSlide() {
  autoSlideInterval = setInterval(showNextSlide, 2000);
}

showSlide(currentIndex);
startAutoSlide();

function handleSubmit(event) {
  event.preventDefault();

  const firstNameInput = document.getElementById('first-name');
  const lastNameInput = document.getElementById('last-name');
  const countryInput = document.getElementById('country');
  const emailInput = document.getElementById('email');
  const phoneInput = document.getElementById('phone');

  if (firstNameInput.value.trim() === '') {
    alert('Please enter your first name.');
    return;
  }

  if (lastNameInput.value.trim() === '') {
    alert('Please enter your last name.');
    return;
  }

  if (countryInput.value.trim() === '') {
    alert('Please enter your country.');
    return;
  }

  if (!validateEmail(emailInput.value)) {
    alert('Please enter a valid email address.');
    return;
  }

  if (!validatePhoneNumber(phoneInput.value)) {
    alert('Please enter a valid phone number (10 digits).');
    return;
  }

  event.target.reset();
}

function validateEmail(email) {
  return true;
}

function validatePhoneNumber(phoneNumber) {
  return true;
}

document.addEventListener('DOMContentLoaded', function() {
const btn1 = document.getElementById('btn-1');
const btn2 = document.getElementById('btn-2');

  btn1.addEventListener('mouseover', function() {
    createTooltip(btn1, 'To Be Successfull');
  });

  btn2.addEventListener('mouseover', function() {
    createTooltip(btn2, 'Join More Creative');
  });

  btn1.addEventListener('mouseout', removeTooltip);
  btn2.addEventListener('mouseout', removeTooltip);

  btn1.addEventListener('click', function() {
    alert('You are Logging');
  });
  btn2.addEventListener('click', function() {
    alert('Create an Account');
  });

  function createTooltip(element, text) {
    const tooltip = document.createElement('div');
    tooltip.classList.add('tooltip');
    tooltip.textContent = text;

    const rect = element.getBoundingClientRect();
    const top = rect.top + window.pageYOffset + rect.height + 10; // Add spacing
    const left = rect.left + window.pageXOffset;

    tooltip.style.top = top + 'px';
    tooltip.style.left = left + 'px';

    document.body.appendChild(tooltip);
  }

  function removeTooltip() {
    const tooltip = document.querySelector('.tooltip');
    if (tooltip) {
      tooltip.remove();
    }
  }
});