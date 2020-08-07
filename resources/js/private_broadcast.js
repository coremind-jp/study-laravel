Echo.private(`broadcast.private.${location.pathname.split("/").pop()}`)
    .listen('PrivateBroadcastEvent', e => {
        const child = document.createElement("i");

        child.textContent = e.message;
        child.className = "d-block";

        document.querySelector("#recieved").appendChild(child);
    });

document.querySelector("#submit").addEventListener(
    "click",
    _.debounce(
        e => {
            axios.post(`/api/study/broadcast/private/post`,
            {
                message: document.querySelector("#message").value
            },
            {
                headers: {
                    Authorization: `Bearer ${$('meta[name="api-token"]').attr('content')}`,
                }
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
