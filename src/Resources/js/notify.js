class Notify {
    messages = [];
    items = [];
    itemsToKill = [];
    killTimeout = null;

    set(val) {
        this.messages.push(val)
        this.spawnNotes();
    }

    spawnNote(i = 0) {
        const id = i;
        const trx = genTrx(4);
        const message = this.messages[i];
        const note = new Notification({
            id: `note-${trx}`,
            icon: message.icon,
            title: message.title,
            subtitle: message.subtitle,
            actions: message.actions
        });
        const transY = 100 * this.items.length;

        note.el.style.transform = `translateY(${transY}%)`;
        note.el.addEventListener("click", (evt) => this.dismiss(note, evt));

        this.items.push(note);
        this.messages.splice(id, 1);
        setTimeout(() => this.close(note), message.time || 30000)
    }

    spawnNotes(amount) {
        let count = this.messages.length;

        for (let i = 0; i < count; i++) {
            this.spawnNote(i);
        }
    }

    dismiss(note, e) {
        const tar = e?.target;
        if (("dismiss" in tar?.dataset)) {
            this.close(note)
        }
    }

    close(note) {
        note.el.classList.add("notification--out");
        this.itemsToKill.push(note);
        clearTimeout(this.killTimeout);

        this.killTimeout = setTimeout(() => {
            this.itemsToKill.forEach(itemToKill => {
                document.body.removeChild(itemToKill.el);

                const left = this.items.filter(item => item.id !== itemToKill.id);
                this.items = [...left];
            });

            this.itemsToKill = [];

            if (!this.items.length)
                this.spawnNotes();

            this.shiftNotes();
        }, note.killTime);
    }

    shiftNotes() {
        this.items.forEach((item, i) => {
            const transY = 100 * i;
            item.el.style.transform = `translateY(${transY}%)`;
        });
    }
}

class Notification {
    constructor(args) {
        this.args = args;
        this.el = null;
        this.id = null;
        this.killTime = 300;
        this.init(args);
    }

    init(args) {
        const {id, icon, title, subtitle, actions} = args;
        const block = "notification";
        const parent = document.body;
        const xmlnsSVG = "http://www.w3.org/2000/svg";
        const xmlnsUse = "http://www.w3.org/1999/xlink";

        const note = this.newEl("div");
        note.id = id;
        note.className = block;
        parent.insertBefore(note, parent.lastElementChild);

        const box = this.newEl("div");
        box.className = `${block}__box`;
        note.appendChild(box);

        const content = this.newEl("div");
        content.className = `${block}__content`;
        box.appendChild(content);

        const _icon = this.newEl("div");
        _icon.className = `${block}__icon`;
        content.appendChild(_icon);

        const iconSVG = this.newEl("svg", xmlnsSVG);
        iconSVG.setAttribute("class", `${block}__icon-svg`);
        iconSVG.setAttribute("role", "img");
        iconSVG.setAttribute("aria-label", icon);
        iconSVG.setAttribute("width", "32px");
        iconSVG.setAttribute("height", "32px");
        _icon.appendChild(iconSVG);

        const iconUse = this.newEl("use", xmlnsSVG);
        iconUse.setAttributeNS(xmlnsUse, "href", `#${icon}`);
        iconSVG.appendChild(iconUse);

        const text = this.newEl("div");
        text.className = `${block}__text`;
        content.appendChild(text);

        const _title = this.newEl("div");
        _title.className = `${block}__text-title`;
        _title.textContent = title;
        text.appendChild(_title);

        if (subtitle) {
            const _subtitle = this.newEl("div");
            _subtitle.className = `${block}__text-subtitle`;
            _subtitle.textContent = subtitle;
            text.appendChild(_subtitle);
        }

        const btns = this.newEl("div");
        btns.className = `${block}__btns`;
        box.appendChild(btns);

        actions.forEach(action => {
            const btn = this.newEl("button");
            let title = action
            let cb = null
            btn.className = `${block}__btn`;
            btn.type = "button";

            btn.setAttribute("data-dismiss", id);
            if (typeof action !== 'string') {
                title = action.title;
                if (action.hasOwnProperty('cb')) {
                    btn.addEventListener('click', action.cb);
                } else if (action.hasOwnProperty('url')) {
                    btn.addEventListener('click', () => location.href = action.url);
                }

            }

            const btnText = this.newEl("span");
            btnText.className = `${block}__btn-text`;
            btnText.textContent = title;

            btn.appendChild(btnText);
            btns.appendChild(btn);
        });

        this.el = note;
        this.id = note.id;
    }

    newEl(elName, NSValue) {
        if (NSValue)
            return document.createElementNS(NSValue, elName);
        else
            return document.createElement(elName);
    }
}

window.notify = new Notify();
