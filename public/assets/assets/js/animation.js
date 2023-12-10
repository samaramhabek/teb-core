/////////////////////////// Moved Buttons /////////////////////////// 
var magnets = document.querySelectorAll('[cursor-class="movedH"]')
var strength = 50

magnets.forEach((magnet) => {
    magnet.addEventListener('mousemove', moveMagnet);
    magnet.addEventListener('mouseout', function (event) {
        TweenMax.to(event.currentTarget, 1, { x: 0, y: 0, ease: Power4.easeOut })
    });
});

function moveMagnet(event) {
    var magnetButton = event.currentTarget
    var bounding = magnetButton.getBoundingClientRect()

    //console.log(magnetButton, bounding)

    TweenMax.to(magnetButton, 1, {
        x: (((event.clientX - bounding.left) / magnetButton.offsetWidth) - 0.5) * strength,
        y: (((event.clientY - bounding.top) / magnetButton.offsetHeight) - 0.5) * strength,
        ease: Power4.easeOut
    })

    //magnetButton.style.transform = 'translate(' + (((( event.clientX - bounding.left)/(magnetButton.offsetWidth))) - 0.5) * strength + 'px,'+ (((( event.clientY - bounding.top)/(magnetButton.offsetHeight))) - 0.5) * strength + 'px)';
}


///////////////////////////  Buttons /////////////////////////// 

$('.btn').on('mouseenter', function () {
    if ($(this).find(".btn-fill").length) {
        gsap.to($(this).find(".btn-fill"), .6, {
            startAt: { y: "76%" },
            y: "0%",
            ease: Power2.easeInOut
        });
    }
    if ($(this).find('.button_text_container.change').length) {
        gsap.to($(this).find('.button_text_container.change'), .3, {
            startAt: { color: "#1C1D20" },
            color: "#FFFFFF",
            ease: Power3.easeIn,
        });
    }
    $(this.parentNode).removeClass('not-active');
});


///////////////////////////  Mouse Leave /////////////////////////// 

$('.btn').on('mouseleave', function () {
    if ($(this).find(".btn-fill").length) {
        gsap.to($(this).find(".btn-fill"), .6, {
            y: "-76%",
            ease: Power2.easeInOut
        });
    }
    if ($(this).find('.button_text_container.change').length) {
        gsap.to($(this).find('.button_text_container.change'), .3, {
            color: "#1C1D20",
            ease: Power3.easeOut,
            delay: .3
        });
    }
    $(this.parentNode).removeClass('not-active');
});


/////////////////////////// Cursor ///////////////////////////

const cursor = document.querySelector(".cursor");
const follower = document.querySelector(".cursor__circle");
const card = document.querySelectorAll(".btn");

let posX = 0,
	posY = 0,
	mouseX = 0,
	mouseY = 0;

TweenMax.to({}, 0.02, {
	repeat: -1,
	onRepeat: function () {
		posX += (mouseX - posX) / 9;
		posY += (mouseY - posY) / 9;

		TweenMax.set(follower, {
			css: {
				left: posX - 20,
				top: posY - 20
			}
		});

		TweenMax.set(cursor, {
			css: {
				left: mouseX,
				top: mouseY
			}
		});
	}
});

document.addEventListener("mousemove", (e) => {
	mouseX = e.pageX;
	mouseY = e.pageY;
});

card.forEach((el) => {
	el.addEventListener("mouseenter", () => {
		cursor.classList.add("active");
		follower.classList.add("active");
	});

	el.addEventListener("mouseleave", () => {
		cursor.classList.remove("active");
		follower.classList.remove("active");
	});
});




/////////////////////////// SmothScroll ///////////////////////////
// ScrollSmoother.create({
//     content: ".pages-bady",
//     smooth: 1
//   });
  

/////////////////////////// IMG Parallax ///////////////////////////
(function() {
    var parallax, speed;
  
    parallax = document.querySelectorAll('.img-parallax');
  
    speed = 0.1;
  
    window.onscroll = function() {
      return [].slice.call(parallax).forEach(function(el, i) {
        var dist;
        dist = $(window).scrollTop() - $(el).offset().top;
        return $(el).css('top', dist * speed + 'px');
      });
    };
  
  }).call(this);



//   Animation Seaction

gsap.registerPlugin(ScrollTrigger);

gsap.utils.toArray('.sec-animation').forEach((el, index) => { 
  let tl = gsap.timeline({
    scrollTrigger: {
      trigger: el,
      start: "-300",
    //   toggleActions: "play none none reverse",
        markers: false
    }
  })
  
  tl
  .set(el, {transformOrigin: 'center center'})
  .fromTo(el, 
    { 
        opacity: 0, 
        scale: 0.8, 
        y: "-200"
    }, 
    {
        opacity: 1, 
        scale: 1, 
        y: 0, 
        duration: 1.5, 
        immediateRender: false
    }
    )
})


// Text Animation

/* ------Great Horned Owl Sequence------  */
gsap.set(".circle", { yPercent: -5});
gsap.set(".dotsBlue", { yPercent: 10});
gsap.set(".owlHorned", { yPercent: -20});
gsap.set(".clusterGreat", { yPercent: 5});

gsap.to(".circle", {
  yPercent: 5,
  ease: "none",
  scrollTrigger: {
    trigger: ".clusterGreat",
    scrub: 1
  }, 
});

gsap.to(".dotsBlue", {
  yPercent: -10,
  ease: "none",
  scrollTrigger: {
    trigger: ".clusterGreat",
    scrub: 1
  }, 
});


gsap.to(".owlHorned", {
  yPercent: 20,
  ease: "none",
  scrollTrigger: {
    trigger: ".clusterGreat",
    scrub: 1
  }, 
});

gsap.to(".caption", {
  yPercent: 100,
  ease: "none",
  scrollTrigger: {
    trigger: ".clusterGreat",
  // markers:true,
    end: "bottom center",
    scrub: 1
  }, 
});

gsap.to(".clusterGreat", {
  yPercent: -5,
  ease: "none",
  scrollTrigger: {
    trigger: ".clusterGreat",
    end: "bottom center",
    scrub: 1
  }, 
});


