document.querySelectorAll('.nav-link.admin').forEach(function (link) {
    link.addEventListener('click', function (event) {
        event.preventDefault();
        const route = 'admin/' + this.getAttribute('href');
        return panelView(route);
    })
});

function panelView(route) {
    const getView = async function () {
        try {
            let response = await fetch(route);
            if (response.ok) {
                const secondSuite = document.querySelector('#display-view');
                secondSuite.innerHTML = "";
                let data = await response.json();
                secondSuite.innerHTML = data['view'];
            }
        } catch (e) {
            alert(e.message);
        }
    };
    return getView();
}
