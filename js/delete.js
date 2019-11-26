function delete_now(id) {
    if (confirm("Souhaitez-vous supprimer cette image ?") == true) {
        const form = new FormData()
        form.append("data", id)
        fetch("/portfolio.php", {credentials: "include", method: "POST", body: form})
            .then(r => r.text())
            .then(r => document.querySelector(`#img-${id}`).remove())
        //.then(console.log)
    }
}
