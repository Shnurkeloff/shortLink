document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#shortLink').addEventListener('click', (event) => {
        event.preventDefault()

        let object = {
            link: document.querySelector('input[name="link"]').value,
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }

        fetch("/link", {
            headers: {
                'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
            },
            method: 'post',
            credentials: "same-origin",
            body: JSON.stringify(object),
        }).then(response => response.json())
            .then(response => {

                if (!document.querySelector('#formRedirect').classList.contains('hidden')) {
                    document.querySelector('#formRedirect').classList.add('hidden')
                }

                if (Object.hasOwn(response, 'errors')) {
                    document.querySelector('span').classList.remove('hidden')
                    document.querySelector('span').innerHTML = response.errors.link[0]
                } else {
                    document.querySelector('#formRedirect').classList.remove('hidden')
                    document.querySelector('#formRedirect').setAttribute('action', '/' + response.code)
                    document.querySelector('#new_link').value = response.new_link
                }

            })
    })
})
