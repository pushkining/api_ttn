async function getResponse() {
    let url = 'https://reqres.in/api/users?page=2';
    fetch(url)
        .then(response => response.json())
        .then(commit => {
            let arr = commit.data;
            let list = document.querySelector('.posts');
            for (const key in arr) {
                //console.log(arr[key]);
                list.innerHTML += `
                    <h4>${arr[key].first_name + " " + arr[key].last_name}</h4>
                    <li>${arr[key].email}</li>
                `
            }
        });
}

//getResponse();
function valid() {
    let ttn = document.querySelector('#ttn_input').value
    console.log(ttn);
//     if (!(/\d{14}/g.test(ttn))) {
//         this.nameError.classList.remove('auth__error_hide');
//         this.nameError.classList.add('auth__error_show');
//     } else {
//         console.log("RAgga");
//     }
}