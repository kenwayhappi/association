//sidebar
const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');

allDropdown.forEach(item=> {
    const a = item.parentElement.querySelector('a:first-child');
    a.addEventListener('click', function (e) {
        e.preventDefault();

        if(!this.classList.contains('active')){
            allDropdown.forEach(i=> {
                const aLink = i.parentElement.querySelector('a:first-child');

                aLink.classList.remove('active');
                i.classList.remove('show');
            })
        }

        this.classList.toggle('active');
        item.classList.toggle('show');
    })
})
//profil navbar
const profile = document.querySelector('nav .profile');
const imgprofile = profile.querySelector('img');
const dropdownprofile = profile.querySelector('.profile-link');

imgprofile.addEventListener('click', function () {
    dropdownprofile.classList.toggle('show');
})

window.addEventListener('click', function(e) {
    if(e.target !== imgprofile){
        if(e.target !== dropdownprofile){
            if(dropdownprofile.classList.contains('show')){
                dropdownprofile.classList.toggle('show');
            }
        }
    }
})


// SIDEBAR ENTRE
const toggleSidebar = document.querySelector('nav .toggle-sidebar');
const sidebar = document.getElementById('sidebar');

toggleSidebar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})
