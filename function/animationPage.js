function animateShape(destination) {
    const transitionShape = document.getElementById('transitionShape');
    
    transitionShape.style.opacity = '1';
    
    setTimeout(() => {
      transitionShape.style.opacity = '0';
      window.location.href = destination;
    }, 500); 
    
    return false; 
  }
