class NotificationManager {
    constructor() {
        this.queue = [];
        this.activeNotifications = [];
        this.pendingRemoval = [];
        this.removalTimeout = null;
    }

    push(message) {
        this.queue.push(message);
        this.displayNotifications();
    }

    displayNotification() {
        if (!this.queue.length) return;

        const message = this.queue.shift();
        const transactionId = this.generateTransactionId(4);
        const onClose = () => this.close(notification); // Замыкание для доступа к методу закрытия
        const notification = new NotificationItem({
            id: `notification-${transactionId}`,
            ...message,
            onClose // Передаем функцию закрытия в конструктор уведомления
        });

        const translateY = 100 * this.activeNotifications.length;
        notification.element.style.transform = `translateY(${translateY}%)`;
        this.activeNotifications.push(notification);

        if (message.time) {
            notification.autoCloseTimeout = setTimeout(onClose, message.time);
        }
    }

    displayNotifications() {
        this.queue.forEach(() => this.displayNotification());
    }

    close(notification) {
        notification.element.classList.add("notification--out");
        if (!this.pendingRemoval.includes(notification)) {
            this.pendingRemoval.push(notification);
        }
        clearTimeout(notification.autoCloseTimeout);

        this.removalTimeout = setTimeout(() => {
            this.pendingRemoval.forEach(notificationToRemove => {
                if (document.body.contains(notificationToRemove.element)) {
                    document.body.removeChild(notificationToRemove.element);
                }
                this.activeNotifications = this.activeNotifications.filter(activeNotification => activeNotification.id !== notificationToRemove.id);
            });

            this.pendingRemoval = [];
            this.adjustNotificationPositions();
        }, 300);
    }

    clear() {
        for (const notification of this.activeNotifications) {
            this.close(notification);
        }
    }

    sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    adjustNotificationPositions() {
        this.activeNotifications.forEach((notification, index) => {
            const translateY = 100 * index;
            notification.element.style.transform = `translateY(${translateY}%)`;
        });
    }

    generateTransactionId(length) {
        return Array.from({length}, () => Math.floor(Math.random() * 16).toString(16)).join('');
    }
}

class NotificationItem {
    constructor({id, icon, title, subtitle, actions, onClose}) {
        this.id = id;
        this.element = this.initialize({id, icon, title, subtitle, actions, onClose});
    }

    initialize({id, icon, title, subtitle, actions, onClose}) {
        const notificationElement = document.createElement('div');
        notificationElement.id = id;
        notificationElement.className = 'notification';
        notificationElement.innerHTML = this.createHTML({icon, title, subtitle, actions});

        const buttonsContainer = notificationElement.querySelector('.notification__btns');
        if (typeof actions !== 'undefined') {
            actions.forEach(action => {
                const button = document.createElement('button');
                button.className = 'notification__btn';
                button.textContent = action.title || action;
                if (typeof action === 'object' && action.cb) {
                    button.addEventListener('click', () => action.cb(onClose));
                } else {
                    button.addEventListener('click', onClose);
                }
                buttonsContainer?.appendChild(button);
            });
        } else {
            notificationElement.addEventListener('click', onClose);
        }

        document.body.appendChild(notificationElement);
        return notificationElement;
    }

    createHTML({icon, title, subtitle}) {
        return `
            <div class="notification__box">
                <div class="notification__content">
                    <div class="notification__icon">
                        <svg class="notification__icon-svg" role="img" aria-label="${icon}" width="32px" height="32px">
                            <use href="#${icon}"></use>
                        </svg>
                    </div>
                    <div class="notification__text">
                        <div class="notification__text-title">${title}</div>
                        ${subtitle ? `<div class="notification__text-subtitle">${subtitle}</div>` : ''}
                    </div>
                </div>
                <div class="notification__btns"></div>
            </div>
        `;
    }
}

window.notify = new NotificationManager();
