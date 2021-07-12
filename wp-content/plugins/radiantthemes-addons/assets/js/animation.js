var textWrapper = document.querySelector('.rt-text-1');

if (textWrapper !== null) {
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
}

anime.timeline({loop: false})
  .add({
    targets: '.rt-text-1 .letter',
    opacity: [0,1],
    easing: "easeInOutQuad",
    duration: 2250,
    delay: (el, i) => 70 * (i+1)
  }).add({
    targets: '.rt-text-1',
    opacity: 1,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
  
var textWrapper1 = document.querySelector('.rt-text-2 .letters');
if (textWrapper1 !== null) {
    textWrapper1.innerHTML = textWrapper1.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
}

anime.timeline({loop: false})
  .add({
    targets: '.rt-text-2 .letter',
    rotateY: [-90, 0],
    duration: 3300,
    delay: (el, i) => 45 * i
  }).add({
    targets: '.rt-text-2',
    opacity: 1,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
  
var textWrapper2 = document.querySelector('.rt-text-3');
if (textWrapper2 !== null) {
    textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
}

anime.timeline({loop: false})
  .add({
    targets: '.rt-text-3 .letter',
    translateY: [-100,0],
    easing: "easeOutExpo",
    duration: 2800,
    delay: (el, i) => 30 * i
  }).add({
    targets: '.rt-text-3',
    opacity: 1,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });