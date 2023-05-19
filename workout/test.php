<div class="running">
    <div class="outer">
        <div class="body">
            <div class="arm behind"></div>
            <div class="arm front"></div>
            <div class="leg behind"></div>
            <div class="leg front"></div>
        </div>
    </div>
</div>

<div class="buttons">
    <button onclick="document.querySelector('.running').style.setProperty('--color', 'rgba(255, 255, 255, .3)')">opacity .3</button>
    <button onclick="document.querySelector('.running').style.setProperty('--color', 'rgba(255, 255, 255, 1)')">opacity 1</button>
    <button onclick="document.querySelector('.running').style.setProperty('--duration', '.5s')">duration .5</button>
    <button onclick="document.querySelector('.running').style.setProperty('--duration', '0s')">duration 1</button>
    <button onclick="document.querySelector('.running').style.setProperty('--duration', '.7s')">duration .7</button>
</div>

<!-- dribbble - twitter -->
<a class="dribbble" href="https://dribbble.com/aaroniker" target="_blank"><img src="https://cdn.dribbble.com/assets/dribbble-ball-mark-2bd45f09c2fb58dbbfb44766d5d1d07c5a12972d602ef8b32204d28fa3dda554.svg" alt=""></a>
<a class="twitter" target="_blank" href="https://twitter.com/aaroniker_me"><svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72"><path d="M67.812 16.141a26.246 26.246 0 0 1-7.519 2.06 13.134 13.134 0 0 0 5.756-7.244 26.127 26.127 0 0 1-8.313 3.176A13.075 13.075 0 0 0 48.182 10c-7.229 0-13.092 5.861-13.092 13.093 0 1.026.118 2.021.338 2.981-10.885-.548-20.528-5.757-26.987-13.679a13.048 13.048 0 0 0-1.771 6.581c0 4.542 2.312 8.551 5.824 10.898a13.048 13.048 0 0 1-5.93-1.638c-.002.055-.002.11-.002.162 0 6.345 4.513 11.638 10.504 12.84a13.177 13.177 0 0 1-3.449.457c-.846 0-1.667-.078-2.465-.231 1.667 5.2 6.499 8.986 12.23 9.09a26.276 26.276 0 0 1-16.26 5.606A26.21 26.21 0 0 1 4 55.976a37.036 37.036 0 0 0 20.067 5.882c24.083 0 37.251-19.949 37.251-37.249 0-.566-.014-1.134-.039-1.694a26.597 26.597 0 0 0 6.533-6.774z"></path></svg></a>
<style>
    .running {
    --color: black;
    --duration: 0s;
    .outer {
        animation: outer var(--duration) linear infinite;
        .body {
            background: var(--color);
            height: 15px;
            width: 8px;
            border-radius: 4px;
            transform-origin: 4px 11px;
            position: relative;
            transform: rotate(32deg);
            animation: body var(--duration) linear infinite;
            &:before {
                content: '';
                width: 8px;
                height: 8px;
                border-radius: 4px;
                bottom: 16px;
                left: 0;
                position: absolute;
                background: var(--color);
            }
            .arm,
            .arm:before,
            .leg,
            .leg:before {
                content: '';
                width: var(--w, 11px);
                height: 4px;
                top: var(--t, 0);
                left: var(--l, 2px);
                border-radius: 2px;
                transform-origin: 2px 2px;
                position: absolute;
                background: var(--c, var(--color));
                transform: rotate(var(--r, 0deg));
                animation: var(--name, arm-leg) var(--duration) linear infinite;
            }
            .arm {
                &:before {
                    --l: 7px;
                    --name: arm-b;
                }
                &.front {
                    --r: 24deg;
                    --r-to: 164deg;
                    &:before {
                        --r: -48deg;
                        --r-to: -36deg;
                    }
                }
                &.behind {
                    --r: 164deg;
                    --r-to: 24deg;
                    &:before {
                        --r: -36deg;
                        --r-to: -48deg;
                    }
                }
            }
            .leg {
                --w: 12px;
                --t: 11px;
                &:before {
                    --t: 0;
                    --l: 8px;
                }
                &.front {
                    --r: 10deg;
                    --r-to: 108deg;
                    &:before {
                        --r: 18deg;
                        --r-to: 76deg;
                    }
                }
                &.behind {
                    --r: 108deg;
                    --r-to: 10deg;
                    --c: none;
                    &:before {
                        --c: var(--color);
                        --r: 76deg;
                        --r-to: 18deg;
                    }
                    &:after {
                        content: '';
                        top: 0;
                        right: 0;
                        height: 4px;
                        width: 6px;
                        clip-path: polygon(2px 0, 6px 0, 6px 4px, 0 4px);
                        border-radius: 0 2px 2px 0;
                        position: absolute;
                        background: var(--color);
                    }
                }
            }
        }
    }
}

@keyframes outer {
    50% {
        transform: translateY(0);
    }
    25%,
    75% {
        transform: translateY(4px);
    }
}

@keyframes body {
    50% {
        transform: rotate(16deg);
    }
    25%,
    75% {
        transform: rotate(24deg);
    }
}

@keyframes arm-leg {
    50% {
        transform: rotate(var(--r-to));
    }
}

@keyframes arm-b {
    30%,
    70% {
        transform: rotate(var(--r-to));
    }
}

.buttons {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 40px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    button {
        border: 0;
        background: 0;
        padding: 8px 16px;
        margin: 0;
        font-weight: 500;
        font-size: 16px;
        cursor: pointer;
        outline: none;
        -webkit-appearance: none;
        color: var(--c, #8A91B4);
        transition: color .3s, transform .3s;
        transform: scale(var(--s, 1));
        &:hover {
            --c: #D1D6EE;
        }
        &:active {
            --s: .9;
        }
    }
}

html {
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
}

* {
    box-sizing: inherit;
    &:before,
    &:after {
        box-sizing: inherit;
    }
}

// Center & dribbble
body {
    min-height: 100vh;
    display: flex;
    font-family: 'Roboto', Arial;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background: #2B3044;
    .running {
        zoom: 2;
        margin-top: -32px;
    }
    .dribbble {
        position: fixed;
        display: block;
        right: 20px;
        bottom: 20px;
        img {
            display: block;
            height: 28px;
        }
    }
    .twitter {
        position: fixed;
        display: block;
        right: 64px;
        bottom: 14px;
        svg {
            width: 32px;
            height: 32px;
            fill: #1da1f2;
        }
    }
}
</style>