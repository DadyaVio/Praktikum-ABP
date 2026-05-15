import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: DemoPage(),
    );
  }
}

class DemoPage extends StatelessWidget {
  DemoPage({super.key});

  final List<String> buah = [
    "Apel",
    "Jeruk",
    "Mangga",
    "Anggur",
    "Semangka"
  ];

  Widget judul(String text) {
    return Padding(
      padding: const EdgeInsets.only(bottom: 10),
      child: Text(
        text,
        style: const TextStyle(
          fontSize: 22,
          fontWeight: FontWeight.bold,
        ),
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.grey[100],

      appBar: AppBar(
        title: const Text("Dadya Vio H-2311102123"),
        centerTitle: true,
      ),

      body: SingleChildScrollView(
        padding: const EdgeInsets.all(16),

        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [

            /// ==================
            /// CONTAINER
            /// ==================

            judul("1. Container"),

            Center(
              child: Container(
                width: 180,
                height: 90,
                decoration: BoxDecoration(
                  color: Colors.blue,
                  borderRadius: BorderRadius.circular(16),
                ),

                child: const Center(
                  child: Text(
                    "Container",
                    style: TextStyle(
                      color: Colors.white,
                      fontSize: 18,
                    ),
                  ),
                ),
              ),
            ),

            const SizedBox(height: 30),

            /// ==================
            /// GRIDVIEW
            /// ==================

            judul("2. GridView"),

            SizedBox(
              height: 200,

              child: GridView.count(
                crossAxisCount: 3,
                crossAxisSpacing: 8,
                mainAxisSpacing: 8,

                children: List.generate(
                  6,
                      (index) => Card(
                    elevation: 4,
                    color: Colors.orange,

                    child: Center(
                      child: Text(
                        "Item ${index + 1}",
                        style: const TextStyle(
                          color: Colors.white,
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                    ),
                  ),
                ),
              ),
            ),

            const SizedBox(height: 30),

            /// ==================
            /// LISTVIEW
            /// ==================

            judul("3. ListView"),

            SizedBox(
              height: 150,

              child: Card(
                child: ListView(
                  children: const [
                    ListTile(title: Text("A")),
                    ListTile(title: Text("B")),
                    ListTile(title: Text("C")),
                  ],
                ),
              ),
            ),

            const SizedBox(height: 30),

            /// ==================
            /// LISTVIEW BUILDER
            /// ==================

            judul("4. ListView.builder"),

            SizedBox(
              height: 200,

              child: Card(
                child: ListView.builder(
                  itemCount: buah.length,

                  itemBuilder: (context,index){

                    return ListTile(
                      leading:
                      const Icon(Icons.apple),

                      title:
                      Text(buah[index]),
                    );
                  },
                ),
              ),
            ),

            const SizedBox(height: 30),

            /// ==================
            /// LISTVIEW SEPARATED
            /// ==================

            judul("5. ListView.separated"),

            SizedBox(
              height: 200,

              child: Card(
                child: ListView.separated(

                  itemCount: buah.length,

                  separatorBuilder:
                      (_,__) =>
                  const Divider(),

                  itemBuilder:
                      (context,index){

                    return ListTile(
                      title:
                      Text(buah[index]),
                    );
                  },
                ),
              ),
            ),

            const SizedBox(height: 30),

            /// ==================
            /// STACK
            /// ==================

            judul("6. Stack"),

            Center(
              child: Stack(
                alignment:
                Alignment.center,

                children: [

                  Container(
                    width: 220,
                    height: 140,
                    decoration:
                    BoxDecoration(
                      color: Colors.red,
                      borderRadius:
                      BorderRadius.circular(20),
                    ),
                  ),

                  Container(
                    width: 130,
                    height: 80,
                    decoration:
                    BoxDecoration(
                      color: Colors.yellow,
                      borderRadius:
                      BorderRadius.circular(15),
                    ),
                  ),

                  const Text(
                    "STACK",
                    style: TextStyle(
                      fontSize: 28,
                      fontWeight:
                      FontWeight.bold,
                    ),
                  )
                ],
              ),
            ),

            const SizedBox(height: 40),
          ],
        ),
      ),
    );
  }
}