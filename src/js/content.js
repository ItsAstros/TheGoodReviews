document.addEventListener("DOMContentLoaded", function() {

    gsap.registerPlugin(ScrollTrigger);

    // Target elements
    const img1 = document.querySelector('.img-1');
    const img2 = document.querySelector('.img-2');
    const img3 = document.querySelector('.img-3');
    
    // Create timelines for each image animation
    const img1Timeline = gsap.timeline({
      scrollTrigger: {
        trigger: img1,
        start: "top bottom", // Start animation when top of image hits bottom of viewport
        end: "bottom top",   // End animation when bottom of image hits top of viewport
        scrub: true,          // Animate based on scroll position
        toggleActions: "play pause reverse pause" // Control animation based on scroll direction
      }
    });
  
    const img2Timeline = gsap.timeline({
      scrollTrigger: {
        trigger: img2,
        start: "top bottom",
        end: "bottom top",
        scrub: true,
        toggleActions: "play pause reverse pause"
      }
    });
  
    const img3Timeline = gsap.timeline({
      scrollTrigger: {
        trigger: img3,
        start: "top bottom",
        end: "bottom top",
        scrub: true,
        toggleActions: "play pause reverse pause"
      }
    });
  
    img1Timeline
      .from(img1, { y: 100, opacity: 0, duration: 1 })
      .to(img1, { y: 0, opacity: 1, duration: 1 });
  
    img2Timeline
      .from(img2, { x: -100, opacity: 0, duration: 1 })
      .to(img2, { x: 0, opacity: 1, duration: 1 });
  
    img3Timeline
      .from(img3, { scale: 0.5, opacity: 0, duration: 1 })
      .to(img3, { scale: 1, opacity: 1, duration: 1 });

    gsap.from(".section-two", {
        scrollTrigger: {
            trigger: ".section-two",
            start: "top center", // Start the animation when the top of the trigger hits the center of the viewport
            end: "bottom center", // End the animation when the bottom of the trigger hits the center of the viewport
            scrub: true, // Smooth scrubbing, takes 1 second to "catch up" to the scrollbar
            markers: false, // Set to true to see the start and end points
        },
        transform: "translateY(0)", // Animate the section to move up to its original position
        duration: 1, // Duration of the animation
        ease: "power1.inOut" // Easing function
    });
    
  });
  