<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    window.addEventListener('message', event => {
        alertify.set('notifier', 'position', 'top-right');
        alertify.notify(event.detail.text, event.detail.type);
    })
</script>
