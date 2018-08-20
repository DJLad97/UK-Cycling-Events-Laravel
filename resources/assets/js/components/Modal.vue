<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-container">
                <div class="modal-header">
                    SIGN IN
                    <button type="button" @click="$emit('close')" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <slot></slot>
                </div>
            </div>
        </div>
    </transition>
</template>