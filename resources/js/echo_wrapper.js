export default ({ api, channel, event, method, auth }) => {
    const debounceArgs = [200, { leading: true, trailing: false }];
    
    let status = false;
    function updateJoinStatus(value) {
        if (status === value)
            return;

        status = value;

        if (status) {
            document.querySelector("#join").disabled = true;
            document.querySelector("#message").readOnly = false;
            document.querySelector("#leave").disabled = false;
            document.querySelector("#submit").disabled = false;
        } else {
            document.querySelector("#join").disabled = false;
            document.querySelector("#message").readOnly = true;
            document.querySelector("#leave").disabled = true;
            document.querySelector("#submit").disabled = true;
        }
    }
    
    document.querySelector("#join").addEventListener("click", _.debounce(...[
        e => {
            updateJoinStatus(true);
    
            Echo[method](channel).listen(event, e => {
                const child = document.createElement("i");
    
                child.textContent = e.message;
                child.className = "d-block";
    
                document.querySelector("#recieved").appendChild(child);
            })
        }].concat(debounceArgs)));
    
    
    document.querySelector("#leave").addEventListener("click", _.debounce(...[
        e => {
            updateJoinStatus(false);
            Echo.leave(channel);
        }].concat(debounceArgs)));
    
    
    document.querySelector("#submit").addEventListener("click", _.debounce(...[
        e => {
            axios.post(api, {
                message: document.querySelector("#message").value
            }, auth).then(e => {
                document.querySelector("#message").value =
                document.querySelector("#error").textContent = "";
            }).catch(e => {
                document.querySelector("#error").textContent = e.message;
            });
        }].concat(debounceArgs)));    
};