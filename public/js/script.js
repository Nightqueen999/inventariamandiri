var id_update = document.querySelectorAll('#id_user');
var id = document.getElementById('id_useredit');
var username = document.getElementById('username');
var position = document.getElementById('position');
    id_update.forEach(edit =>{
        edit.addEventListener('click',function(){
            var id_user = this.dataset.id;
            fetch('http://localhost/inventariamandiri/public/dashboardadmin/ambildata/' + id_user)
            .then(response => response.json())
            .then(data => {
                id.value = data.id_manageuser;
                username.value = data.username;
                position.value = data.position;
            })
        })
    })