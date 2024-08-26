$(document).ready(function() {
    function runAnimations() {
        var wScroll = $(window).scrollTop();
        var windowHeight = $(window).height();

        console.log('Running animations: scrollTop:', wScroll, 'windowHeight:', windowHeight);

        // Animasi untuk elemen .support-section__tutorial-stack--migarasi, .textmd2, dan #icon1
        $(".support-section__tutorial-stack--migarasi, .textmd2, #icon1").each(function(index) {
            var elementOffset = $(this).offset().top;
            console.log('Element:', $(this), 'Offset:', elementOffset);

            if (wScroll + windowHeight > elementOffset) {
                $(this).delay(index * 300).css({
                    "transform": "translateY(0)",
                    "opacity": 1,
                    "transition": "transform 1.5s ease-out, opacity 1.5s ease-out"
                });
            } else {
                $(this).css({
                    "transform": "translateY(100%)",
                    "opacity": 0,
                    "transition": "transform 0.5s ease-out, opacity 1s ease-out"
                });
            }
        });

        // Animasi untuk elemen .row_image--tertiary dan .images_image--primary dari sebelah kiri
        $(".row_image--tertiary, .images_image--primary").each(function() {
            var elementOffset = $(this).offset().top;
            console.log('Element:', $(this), 'Offset:', elementOffset);

            if (wScroll + windowHeight > elementOffset) {
                $(this).css({
                    "transform": "translateX(0)",
                    "opacity": 1,
                    "transition": "transform 1.5s ease-out, opacity 1.5s ease-out"
                });
            } else {
                $(this).css({
                    "transform": "translateX(-30%) rotate(15deg)",
                    "opacity": 0,
                    "transition": "transform 1s ease-out, opacity 1s ease-out"
                });
            }
        });

        // Animasi untuk elemen .column_image--quaternary, .columnimage--quinary, .stackimage--senary, .column_image--septenary dari sebelah kanan
        $(".column_image--quaternary, .columnimage--quinary, .stackimage--senary, .column_image--septenary").each(function() {
            var elementOffset = $(this).offset().top;
            console.log('Element:', $(this), 'Offset:', elementOffset);

            if (wScroll + windowHeight > elementOffset) {
                $(this).css({
                    "transform": "translateX(0)",
                    "opacity": 1,
                    "transition": "transform 1.5s ease-out, opacity 1.5s ease-out"
                });
            } else {
                $(this).css({
                    "transform": "translateX(30%) rotate(-15deg)",
                    "opacity": 0,
                    "transition": "transform 1s ease-out, opacity 1s ease-out"
                });
            }
        });

        // Animasi untuk elemen #kiri dari sebelah kiri
        $("#kiri1, #kiri2, #kiri3").each(function() {
            var elementOffset = $(this).offset().top;
            console.log('Element:', $(this), 'Offset:', elementOffset);

            if (wScroll + windowHeight > elementOffset) {
                $(this).css({
                    "transform": "translateX(0)",
                    "opacity": 1,
                    "transition": "transform 1.5s ease-out, opacity 1.5s ease-out"
                });
            } else {
                $(this).css({
                    "transform": "translateX(-15%)",
                    "opacity": 0,
                    "transition": "transform 1s ease-out, opacity 1s ease-out"
                });
            }
        });

        // Animasi untuk elemen #kanan dari sebelah kanan
        $("#kanan1, #kanan2, #kanan3").each(function() {
            var elementOffset = $(this).offset().top;
            console.log('Element:', $(this), 'Offset:', elementOffset);

            if (wScroll + windowHeight > elementOffset) {
                $(this).css({
                    "transform": "translateX(0)",
                    "opacity": 1,
                    "transition": "transform 1.5s ease-out, opacity 1.5s ease-out"
                });
            } else {
                $(this).css({
                    "transform": "translateX(15%)",
                    "opacity": 0,
                    "transition": "transform 1s ease-out, opacity 1s ease-out"
                });
            }
        });

        // Animasi untuk elemen .textmd3
        $(".textmd3").each(function() {
            var elementOffset = $(this).offset().top;
            console.log('Element:', $(this), 'Offset:', elementOffset);

            if (wScroll + windowHeight > elementOffset) {
                $(this).css({
                    "transform": "translateX(0)",
                    "opacity": 1,
                    "transition": "transform 1.5s ease-out, opacity 1.5s ease-out"
                });
            } else {
                $(this).css({
                    "transform": "translateX(100%)",
                    "opacity": 0,
                    "transition": "transform 1s ease-out, opacity 1s ease-out"
                });
            }
        });

         // Animation for .support-section__image--cs and .support-section__image--tutorial
         $(".support-section__image--cs, .support-section__image--tutorial").each(function() {
            var elementOffset = $(this).offset().top;

            console.log('Element:', $(this), 'Offset:', elementOffset);

            if (wScroll + windowHeight > elementOffset) {
                $(this).css({
                    "transform": "scale(1)",
                    "opacity": 1,
                    "transition": "transform 2s ease-out, opacity 2s ease-out"
                });
            } else {
                $(this).css({
                    "transform": "scale(0.8)",
                    "opacity": 0,
                    "transition": "transform 1s ease-out, opacity 1s ease-out"
                });
            }
        });

        $(".features__image").each(function() {
            var elementOffset = $(this).offset().top;
            console.log('Element:', $(this), 'Offset:', elementOffset);

            if (wScroll + windowHeight > elementOffset) {
                $(this).css({
                    "transform": "scale(1)",
                    "opacity": 1,
                    "transition": "transform 2s ease-out, opacity 2s ease-out"
                });
            } else {
                $(this).css({
                    "transform": "scale(0.8)",
                    "opacity": 0,
                    "transition": "transform 1s ease-out, opacity 1s ease-out"
                });
            }
        });

        // Animasi untuk elemen .stack_image--secondary, .rowuser, dan .details_health
        $(".stack_image--secondary, .rowuser, .details_health").each(function() {
            var elementOffset = $(this).offset().top;
            console.log('Element:', $(this), 'Offset:', elementOffset);

            if (wScroll + windowHeight > elementOffset) {
                $(this).css({
                    "transform": "scale(1)",
                    "opacity": 1,
                    "transition": "transform 1.5s ease-out, opacity 1.5s ease-out"
                });
            } else {
                $(this).css({
                    "transform": "scale(0.8)",
                    "opacity": 0,
                    "transition": "transform 1s ease-out, opacity 1s ease-out"
                });
            }
        });
    }

    // Function to handle hover animation for menu items
    function handleHoverAnimation() {
        document.querySelectorAll('.dhi-group').forEach(group => {
            group.addEventListener('mouseenter', function() {
                let items = this.querySelectorAll('.menu-column .menu-link');
                let dropdownContent = this.querySelector('.dhi-group-4');
                
                // Tambahkan kelas untuk mengubah border
                this.classList.add('dhi-group-open');
                
                dropdownContent.style.maxHeight = '0px'; // Mulai dari tinggi 0
        
                items.forEach((item, index) => {
                    setTimeout(() => {
                        item.style.opacity = '1';
                        dropdownContent.style.maxHeight = `${(index + 1) * 50}px`; // Tambah tinggi sesuai item yang muncul
                    }, index * 10); // 10ms delay untuk setiap item
                });
        
                this.querySelector('.header__menu-item-icon').style.transform = 'rotate(180deg)'; // Putar ikon panah ke atas
            });
        
            group.addEventListener('mouseleave', function() {
                let items = this.querySelectorAll('.menu-column .menu-link');
                let dropdownContent = this.querySelector('.dhi-group-4');
        
                // Hapus kelas untuk mengubah border
                this.classList.remove('dhi-group-open');
                
                items.forEach(item => {
                    item.style.opacity = '0';
                });
        
                setTimeout(() => {
                    dropdownContent.style.maxHeight = '0px'; // Kembalikan tinggi ke 0 saat mouse keluar
                }, items.length * 10); // Delay sesuai dengan jumlah item
        
                this.querySelector('.header__menu-item-icon').style.transform = 'rotate(0deg)'; // Putar ikon panah ke bawah
            });
        });
    }

    const imageGrid = document.querySelector('.content-section__image-grid-inner');
    if (imageGrid) {
        let clone = imageGrid.cloneNode(true);
        imageGrid.appendChild(clone);

        let currentScrollPosition = 0;
        let scrollAmount = 1; // Adjust the scroll speed

        function startScrolling() {
            currentScrollPosition -= scrollAmount;
            imageGrid.style.transform = `translateX(${currentScrollPosition}px)`;

            if (Math.abs(currentScrollPosition) >= imageGrid.scrollWidth / 2) {
                currentScrollPosition = 0;
            }

            requestAnimationFrame(startScrolling);
        }

        $(document).ready(function() {
            function runAnimations() {
                var wScroll = $(window).scrollTop();
                var windowHeight = $(window).height();
        
                // Animation for images with class .row__image--tertiary and .images__image--primary
                $(".row__image--tertiary, .images__image--primary").each(function() {
                    var elementOffset = $(this).offset().top;
        
                    if (wScroll + windowHeight > elementOffset) {
                        $(this).css({
                            "transform": "translateX(0)",
                            "opacity": 1,
                            "transition": "transform 1.5s ease-out, opacity 1.5s ease-out"
                        });
                    } else {
                        $(this).css({
                            "transform": "translateX(-30%) rotate(15deg)",
                            "opacity": 0,
                            "transition": "transform 1s ease-out, opacity 1s ease-out"
                        });
                    }
                });
        
                // Animation for images with class .column__image--quaternary, .column__image--quinary, .stack__image--senary, .column__image--septenary
                $(".column__image--quaternary, .column__image--quinary, .stack__image--senary, .column__image--septenary").each(function() {
                    var elementOffset = $(this).offset().top;
        
                    if (wScroll + windowHeight > elementOffset) {
                        $(this).css({
                            "transform": "translateX(0)",
                            "opacity": 1,
                            "transition": "transform 1.5s ease-out, opacity 1.5s ease-out"
                        });
                    } else {
                        $(this).css({
                            "transform": "translateX(30%) rotate(-15deg)",
                            "opacity": 0,
                            "transition": "transform 1s ease-out, opacity 1s ease-out"
                        });
                    }
                });
        
                // Animation for images with class .stack__image--secondary, .rowuser, and .details__health
                $(".stack__image--secondary, .rowuser, .details__health").each(function() {
                    var elementOffset = $(this).offset().top;
        
                    if (wScroll + windowHeight > elementOffset) {
                        $(this).css({
                            "transform": "scale(1)",
                            "opacity": 1,
                            "transition": "transform 1.5s ease-out, opacity 1.5s ease-out"
                        });
                    } else {
                        $(this).css({
                            "transform": "scale(0.8)",
                            "opacity": 0,
                            "transition": "transform 1s ease-out, opacity 1s ease-out"
                        });
                    }
                });
            }
        
            // Call animations when the page loads and on scroll
            runAnimations();
            $(window).on("scroll", runAnimations);
        });

        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('#slider1', {
                slidesPerView: 1,
                spaceBetween: 10,
                navigation: {
                    nextEl: '#slider1-control-next',
                    prevEl: '#slider1-control-prev',
                },
                loop: true,
            });
        });
        
        

        startScrolling();
    } else {
        console.log('Image grid not found');
    }

    // Panggil animasi saat halaman dimuat dan di-scroll
    runAnimations();
    handleHoverAnimation();

    $(window).on('scroll', function() {
        runAnimations();
    });
    

});
