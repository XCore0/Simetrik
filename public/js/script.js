function throttle(func, limit) {
    let lastFunc;
    let lastRan;
    return function() {
        const context = this;
        const args = arguments;
        if (!lastRan) {
            func.apply(context, args);
            lastRan = Date.now();
        } else {
            clearTimeout(lastFunc);
            lastFunc = setTimeout(function() {
                if ((Date.now() - lastRan) >= limit) {
                    func.apply(context, args);
                    lastRan = Date.now();
                }
            }, limit - (Date.now() - lastRan));
        }
    };
}

document.querySelectorAll('.swiper-slide').forEach((element) => {
    element.addEventListener('mousemove', throttle((e) => {
        const rect = element.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        const moveX = (x - centerX) / centerX;
        const moveY = (y - centerY) / centerY;

        element.querySelectorAll('.support-section__image--admin3').forEach((img, index) => {
            const depth = index === 0 ? -5 : (index === 2 ? 5 : 0);
            img.style.transform = `
                translateX(${moveX * 10}px)
                translateY(${moveY * 10}px)
                translateZ(${depth}px)
            `;
        });
    }, 30));

    element.addEventListener('mouseleave', () => {
        element.querySelectorAll('.support-section__image--admin3').forEach((img) => {
            img.style.transform = `
                translateX(0)
                translateY(0)
                translateZ(0)
            `;
        });
    });
});


// Mengatur efek 3D dan bayangan pada elemen dengan kelas 'user-profile-2'
document.querySelectorAll('.user-profile-2').forEach((element) => {
    element.addEventListener('mousemove', (e) => {
        const rect = element.getBoundingClientRect();
        const x = e.clientX - rect.left; // Posisi X mouse dalam elemen
        const y = e.clientY - rect.top;  // Posisi Y mouse dalam elemen
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        const moveX = (x - centerX) / centerX; // Menghitung pergerakan pada sumbu X
        const moveY = (y - centerY) / centerY; // Menghitung pergerakan pada sumbu Y
  
        const shadowX = moveX * 10; // Atur sesuai kekuatan bayangan
        const shadowY = moveY * 10; // Atur sesuai kekuatan bayangan
  
        element.querySelector('.user-profile__image').style.transform = `
            rotateY(${moveX * 15}deg) 
            rotateX(${moveY * -15}deg)
            translateZ(20px)
        `;
        
        element.querySelector('.user-profile__image').style.boxShadow = `
            ${shadowX}px ${shadowY}px 20px rgba(0, 0, 0, 0.4)
        `;
    });
  
    element.addEventListener('mouseleave', () => {
        element.querySelector('.user-profile__image').style.transform = `
            rotateY(0deg) 
            rotateX(0deg)
            translateZ(0)
        `;
        element.querySelector('.user-profile__image').style.boxShadow = `
            0 0 0 rgba(0, 0, 0, 0) /* Menghapus bayangan default */
        `;
    });
});

// Mengatur efek gerakan pada gambar di dalam elemen dengan kelas 'columnhubungi__rowclose'
document.querySelectorAll('.columnhubungi__rowclose').forEach((element) => {
    element.addEventListener('mousemove', (e) => {
        const rect = element.getBoundingClientRect();
        const x = e.clientX - rect.left; // Posisi X mouse dalam elemen
        const y = e.clientY - rect.top;  // Posisi Y mouse dalam elemen
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        const moveX = (x - centerX) / centerX; // Menghitung pergerakan pada sumbu X
        const moveY = (y - centerY) / centerY; // Menghitung pergerakan pada sumbu Y
  
        element.querySelectorAll('.columnhubungi__image--close').forEach((img) => {
            img.style.transform = `
                translateZ(${moveY * 10}px) 
                translateX(${moveX * 10}px)
                scale(0.5) /* Sedikit memperbesar gambar */
            `;
        });
    });
  
    element.addEventListener('mouseleave', () => {
        element.querySelectorAll('.columnhubungi__image--close').forEach((img) => {
            img.style.transform = `
                translateZ(0)
                translateX(0)
                scale(1) /* Mengembalikan ukuran gambar */
            `;
        });
    });
});
