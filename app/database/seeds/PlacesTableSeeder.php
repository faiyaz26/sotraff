<?php

class PlacesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('places')->delete();

        $user_id = User::first()->id;



        DB::table('places')->insert(array(

            array(
                'place_name'=> 'Uttara', 
                'place_description' => 'Uttara, A thana',
                'place_latitude' => '23.87374',
                'place_longitude' => '90.40066',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
                ),


            array(
                'place_name'=> 'Banani', 
                'place_description' => 'Banani',
                'place_latitude' => '23.79554',
                'place_longitude' => '90.40092',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
                ),


            array(
                'place_name'=> 'Farmgate', 
                'place_description' => 'Farmgate Bus Stand',
                'place_latitude' => '23.75886',
                'place_longitude' => '90.38950',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
                ),


            array(
                'place_name'=> 'Mirpur 10', 
                'place_description' => 'Mirpur 10 Circle',
                'place_latitude' => '23.80748',
                'place_longitude' => '90.36839',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
                )
            ));

}
}
