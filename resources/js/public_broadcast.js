import echoWrapper from "./echo_wrapper.js";

echoWrapper({
    api: "/api/study/broadcast/public/post",
    channel: `broadcast.public`,
    event: "PublicBroadcastEvent",
    method: "channel",
    auth: {}
});
