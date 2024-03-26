document.addEventListener('DOMContentLoaded', function() {
    window.scrollTo(0, 0);
});

function startLoader() {
    let counterElement = document.querySelector(".count p");
    let currentValue = 0;
    
    function updateCounter() {
        if(currentValue < 100){
            let increment = Math.floor(Math.random() * 10) + 1;
            currentValue = Math.min(currentValue + increment, 100);
            counterElement.textContent = currentValue;

            let delay = Math.floor(Math.random() * 200) + 25;
            setTimeout(updateCounter, delay);
        }
    }

    updateCounter();
    document.body.classList.add('no-scroll');
}
startLoader();
gsap.to(".count", { opacity: 0, delay: 3.5, duration: 0.5});

let textWrapper = document.querySelector(".ml16");
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({ loop: false})
    .add({
        targets: '.ml16 .letter',
        translateY:  [-100, 0],
        easing: "easeOutExpo",
        duration: 1500,
        delay: (el, i) => 30*i
    })
    .add({
        targets: '.ml16 .letter',
        translateY:  [0, 100],
        easing: "easeOutExpo",
        duration: 3000,
        delay: (el, i) => 2000 + 30*i
    });

    gsap.to(".pre-loader", {
        scale: 0.5,
        ease: "power4.inOut",
        duration: 2,
        delay: 3,
        onComplete: function() {
          document.querySelector('.glassmorphism-nav').style.opacity = '0';
          document.querySelector('.glassmorphism-nav').style.display = 'flex';
          document.body.classList.remove('no-scroll');
          document.querySelector('.site-content').style.zIndex = '1';
        
        gsap.to(".glassmorphism-nav", {
            opacity: 1,
            duration: 1,
            ease: "power1.inOut"
        }); 
        }
    })

    gsap.to(".loader", {
        height: "0",
        ease: "power4.inOut",
        duration: 1.5,
        delay: 3.75
    })

    gsap.to(".loader-bg", {
        height: "0",
        ease: "power4.inOut",
        duration: 1.5,
        delay: 4
    })

    gsap.to(".loader-2", {
        clipPath: "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)",
        ease: "power4.inOut",
        duration: 1.5,
        delay: 3.5
    })

    gsap.from(".header h1", {
        y: 200,
        ease: "power4.inOut",
        duration: 1,
        delay: 3.75,
        stagger: 0.05
    })

    gsap.to(".img", {
        clipPath: "polygon(0 0, 100% 0, 100% 100%, 0 100%)",
        ease: "power4.inOut",
        duration: 1.5,
        delay: 4.5,
        stagger: 0.25
    })
