document.addEventListener("DOMContentLoaded", function() {
    const mainImage = document.getElementById("main-image");
    const thumbnails = document.querySelectorAll(".thumbnail");
  
    thumbnails.forEach(thumbnail => {
      thumbnail.addEventListener("click", function() {
        const newSrc = this.src;
        mainImage.src = newSrc;
      });
    });
  
    mainImage.addEventListener("click", function() {
      const fullScreenDiv = document.createElement("div");
      fullScreenDiv.classList.add("fullscreen");
  
      const imgClone = this.cloneNode();
      fullScreenDiv.appendChild(imgClone);
  
      fullScreenDiv.addEventListener("click", function() {
        fullScreenDiv.remove();
      });
  
      document.body.appendChild(fullScreenDiv);
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    const decreaseBtn = document.getElementById("decrease-btn");
    const increaseBtn = document.getElementById("increase-btn");
    const quantityInput = document.getElementById("quantity-input");
  
    decreaseBtn.addEventListener("click", function() {
      let currentValue = parseInt(quantityInput.value);
      if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
      }
    });
  
    increaseBtn.addEventListener("click", function() {
      let currentValue = parseInt(quantityInput.value);
      let maxValue = parseInt(quantityInput.max);
      if (currentValue < maxValue) {
        quantityInput.value = currentValue + 1;
      }
    });
  
    quantityInput.addEventListener("change", function() {
      let currentValue = parseInt(quantityInput.value);
      let maxValue = parseInt(quantityInput.max);
      if (currentValue < 1) {
        quantityInput.value = 1;
      } else if (currentValue > maxValue) {
        quantityInput.value = maxValue;
      }
    });
  });

  


  document.addEventListener("DOMContentLoaded", function() {
    const shippingMethodSelect = document.getElementById("shipping-method");
    const shippingCostDisplay = document.getElementById("shipping-cost");
  
    shippingMethodSelect.addEventListener("change", function() {
      const selectedOption = this.options[this.selectedIndex];
      const cost = selectedOption.text.match(/\$\d+\.\d{2}/);
      if (cost) {
        shippingCostDisplay.textContent = `Shipping Cost: ${cost[0]}`;
      }
    });
  });
  



  // login 


    
      
             $(function() {
               $("form[name='login']").validate({
                 rules: {
                   
                   email: {
                     required: true,
                     email: true
                   },
                   password: {
                     required: true,
                     
                   }
                 },
                  messages: {
                   email: "Please enter a valid email address",
                  
                   password: {
                     required: "Please enter password",
                    
                   }
                   
                 },
                 submitHandler: function(form) {
                   form.submit();
                 }
               });
             });
             
    
    
    $(function() {
      
      $("form[name='registration']").validate({
        rules: {
          firstname: "required",
          lastname: "required",
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 5
          }
        },
        
        messages: {
          firstname: "Please enter your firstname",
          lastname: "Please enter your lastname",
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          email: "Please enter a valid email address"
        },
      
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
    