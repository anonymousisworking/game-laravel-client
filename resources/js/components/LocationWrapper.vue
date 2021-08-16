<template>
    <div id="location-wrapper">
        <div class="location">
            <div class="name"></div>
            <div class="svg-wrapper"><svg></svg></div>
            <img src="" class="map">
        </div>

        <div class="location-select">
            <div class="location-block locations">
                <div class="title">Локации</div>
                <div class="list"></div>
            </div>

            <div class="location-block objects">
                <div class="title">Объекты</div>
                <div class="list"></div>
            </div>

            <div class="location-block characters">
                <div class="title">Персонажи</div>
                <div class="list"></div>
            </div>

            <div class="location-pass">
                <div class="title"></div>
                <div class="progressbar">
                    <div class="progress"></div>
                </div>
            </div>
        </div>

        <span class="loader"></span>
    </div>
</template>

<script>
export default {
    name: "location-wrapper"
}
</script>

<style scoped>

</style>
