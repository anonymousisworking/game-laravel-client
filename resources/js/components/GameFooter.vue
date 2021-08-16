<template>
    <footer>
        <div class="resizer">
            <div class="up">▲</div>
            <div class="down">▼</div>
        </div>
        <div id="chat">
            <div class="flex">
                <div id="messages"></div>
                <div id="chat-room">
                    <div id="location-caption">
                        <span class="name">...</span>
                        (<span class="count">...</span>)
                        <!-- <span class="update icon-spin3" title="Обновить"></span> -->
                    </div>
                    <div id="room-users"></div>
                </div>
            </div>
            <div id="bottom-panel">
                <div id="time"></div>
                <form id="sendmessage-form" class="flex">
                    <div id="message-wrap"><input class="message" id="message" type="text" name="message" size="80" autocomplete="off"></div>
                    <div><input type="image" src="img/chat/message_send.png" title="Отправить" id="sendmessage"></div>
                </form>
                <div><img src="img/chat/chat_clear.gif" title="очистить чат" id="chat-clear"></div>
                <div><img src="img/chat/chat.ico" title="Смайлы"></div>
                <form action="/logout" method="post" id="logout"><button name="logout">Выход</button></form>
            </div>
        </div>
    </footer>s
</template>

<script>
export default {
name: "GameFooter"

    created() {
        console.log(1)
    }
}
</script>

<style scoped>

</style>
