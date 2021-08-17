<template>
    <header>
        <div class="avatar" style="background-image:url('img/images/0.png');" title="Персонаж"></div>
        <div class="info-wrapper">
            <div class="info">
                <div class="align"><img src="img/aligns/99.gif"></div>
                <div class="clan"><img src="img/clans/developers.png"></div>
                <div class="login">{{ user.login }}[{{ user.level }}]</div>
            </div>
            <div class="hp-wrapper">
                <div class="hp-back">
                    <div class="hp-line"></div>
                </div>
                <div class="hp"></div>
            </div>
        </div>
        <div class="top-panel flex">
            <div><img src="img/other/pack.jpg" title="Рюкзак"></div>
            <div><img src="img/other/location.jpg" title="Локация"></div>
            <div><img src="img/other/fight.jpg" title="Бои"></div>
            <div><img src="img/other/quest.jpg" title="Квесты"></div>
            <div><img src="img/other/info.jpg" title="Анкета"></div>
        </div>
    </header>
</template>

<script>

import { mapGetters } from 'vuex'

export default {
    name: "GameHeader",

    computed: mapGetters([
        'user'
    ]),
}
</script>

<style scoped>

</style>
