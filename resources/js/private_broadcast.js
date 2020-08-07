import echoWrapper from "./echo_wrapper.js";

echoWrapper({
    api: "/api/study/broadcast/private/post",
    channel: `broadcast.private.${location.pathname.split("/").pop()}`,
    event: "PrivateBroadcastEvent",
    method: "private",
    auth: {
        headers: {
            Authorization: `Bearer ${$("meta[name=\"api-token\"]").attr("content")}`,
        }
    }
});
