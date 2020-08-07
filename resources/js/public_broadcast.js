Echo.channel('public')
    .listen('PublicBroadcastEvent', e => {
        const child = document.createElement("i");

        child.textContent = e.message;
        child.className = "d-block";

        document.querySelector("#recieved").appendChild(child);
    });

document.querySelector("#submit").addEventListener(
    "click",
    _.debounce(
        e => {
            axios.post(`/api/study/broadcast/public/post`, {
                message: document.querySelector("#message").value
            }).then(e => {
                document.querySelector("#message").value =
                document.querySelector("#error").textContent = "";
            }).catch(e => {
                document.querySelector("#error").textContent = e.message;
            });
        },
        200,
        {
            leading: true,
            trailing: false
        }
    )
);
