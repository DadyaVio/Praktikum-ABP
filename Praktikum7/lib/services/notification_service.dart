import 'package:firebase_messaging/firebase_messaging.dart';
import 'local_notification_service.dart';

class NotificationService {
  static Future<void> initialize() async {
    FirebaseMessaging messaging =
        FirebaseMessaging.instance;

    await messaging.requestPermission();

    String? token = await messaging.getToken();

    print("FCM TOKEN:");
    print(token);

    FirebaseMessaging.onMessage.listen(
      (RemoteMessage message) async {
        print("Notification Received");

        String title =
            message.notification?.title ??
                "Notifikasi";

        String body =
            message.notification?.body ?? "";

        await LocalNotificationService
            .showNotification(
          title: title,
          body: body,
        );
      },
    );
  }
}